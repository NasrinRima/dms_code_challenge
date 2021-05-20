<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Services\UserService;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProfile(){
        $profile = Auth::user();
        return response()->json([
            'success' => true,
            'message' => 'Profile data has been delivered!',
            'data' =>$profile,
        ], 200);
    }
    public function postProfile(Request $request,UserService $service){

        $profile=Auth::user();
        $params =['name'=>$request->name];


        if($request->profile_photo){
            $destinationPath='/uploads/users/logo/';
            $logo=$service->file_uploads($request, $destinationPath, 'profile_photo');
            $params['logo']=$logo;
        }

        if($request->isAutoApproved){
            $params['isAutoApproved']=$request->isAutoApproved;
        }

        $profile->update($params);

        if($profile->getProfile){
            Profile::where('user_id',$profile->id)->update([
                'user_id'=>$profile->id,
                'mobile_no'=>$request->mobile_no,
                'country'=>$request->country,
                'city'=>$request->city,
                'address'=>$request->address,
                'zipcode'=>$request->zipcode,
            ]);
        }else{
            Profile::create([
                'user_id'=>$profile->id,
                'country'=>$request->country,
                'city'=>$request->city,
                'address'=>$request->address,
                'zipcode'=>$request->zipcode,
                'mobile_no'=>$request->mobile_no,
            ]);
        }
       return back()->with('succeess','Profile has been updated successfully!');
    }
}
