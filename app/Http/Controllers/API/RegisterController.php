<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Services\UserService;
use Hash;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request,UserService $services)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'event_link' => 'required',
            'timezone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $params =[
            'name'=>$request->name,
            'email'=>$request->email,
            'event_link'=>$request->event_link,
            'timezone'=>$request->timezone,
            'password'=>Hash::make($request->password),
            'role_id'=>3,
            'is_active'=>True,
        ];
        if($request->logo){
            if (!file_exists('uploads/users/logo/')) {
                mkdir('/uploads/users/logo/', 0777, true);
            }
            $destinationPath ='/uploads/users/logo/';
            $logo = $services->file_uploads($request, $destinationPath,'logo');
            $params['logo']=$logo;
        }

        $user = User::create($params);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('basicproject')->accessToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
