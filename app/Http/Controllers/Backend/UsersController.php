<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Validator;
use Illuminate\Support\Facades\App;
use  App\Models\BasicPart\User;
use Alfaj\Acl\Models\UserRole;
use Alfaj\Acl\Models\Role;
use DB;
use Auth;
use Hash;


class UsersController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = User::paginate(30);
        return view('backend.user.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where('role_id','<>',1)->get();
        return view('backend.user.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $lang = App::getLocale();
            $user = User::create([
                'name' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_active' => 1,
            ]);

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request->role_id,
            ]);
            DB::commit();
            return redirect("/{$lang}/admin/user")->with('success', 'New User has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->active){
            $status=0;
            if($request->active=='true'){
                $status=1;
            }

            User::where('id', $id)->update([
                "is_active" => $status
            ]);
            return back()->with('success','User status has been updated successfully!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('role_id','<>',1)->get();
        $row=User::find($id);
        return view('backend.user.edit',compact('row','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
           $roleObj=UserRole::where('user_id',$id)->first();
           $roleObj->update([
               'role_id'=>$request->role_id
           ]);
           $userObj=find($id);
           $userObj->update([
               'name' => $request->name,
               'role_id' => $request->role_id,
           ]);

            DB::commit();
           return back()->with('success','User info has been updated successfully!');
       }catch (\Exception $e){
            DB::rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function myProfile(){
        $userProfile = User::where('id',authID())->first();
        return view('backend.user_profile.profile',compact('userProfile'));
    }
    public function editProfile(){
        $userProfile = User::where('id',authID())->first();
        return view('backend.user_profile.edit',compact('userProfile'));

    }
    public function updateProfile(Request $request){
        DB::beginTransaction();
        try{

            User::where('id',authID())->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            DB::commit();
            return redirect('/admin/my-profile');
        }catch (\Exception $e){
            DB::rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
    public function changePassword(){
        return view('backend.user_profile.change_password');
    }
    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
                'password' => 'min:8|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:8|required',
            ],
            [

                'password.required' => "Password is required",
                'password.min' => "Password must be at least 8 characters and should contain a small letter, a capital letter and a number",
                'confirm_password.required' => "Confirm Password field is required",
            ]
        );


        if (Hash::check($request->input('old_password'), Auth::user()->password)) {
                if($validator->fails()){
                    return  back()->with('error', 'Password and Confirm Password are not same!');

                }

                else {
                    User::where('id',authID())->update([
                        'password' => bcrypt($request->password),
                    ]);
                return redirect("/admin/my-profile")->with('success', 'Password has been created successfully!');

            }
        }
        else {
            return back()->with('error', 'Incorrect  password.');
        }

    }
}
