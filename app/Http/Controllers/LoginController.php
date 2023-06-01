<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function showLogin()
    {
        DB::connection()->getPdo();

        return view('login');
    }

    public function login(Request $request)
    { 
      
        User::get();


        $username = $request['username'];
        $password = $request['password'];

        //Validate from Laravel
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validate->fails()){
            $error_array = $validate->errors()->all();
            return redirect()->back()->withErrors($error_array);
        }       

        //Method 3
        $username_check = User::
            where('username', '=', $username)
            ->first();
        if(!$username_check){
            
          return redirect()->back()->withErrors(['Account login Failed!']);
          
        }

        if (!$username_check->is_active) {
                return redirect()->back()->withErrors([
                    'username' => 'Inactive user.',
        ]);
        }
        if($username_check == true){
            $password_check = $password == $username_check['password'];
            
            if($password_check){
                
                if($username_check['role'] == 'Admin Root'){
                    
                    $request->session()->put('username',$username_check->username);
                    $request->session()->put('role',$username_check->role);                                        
                    Alert::success('Success', 'Welcome, ' . $username_check->username);
                    return redirect()->route('admin_user_page');}
                
              
                if($username_check['role'] == 'Admin Po'){
                    $request->session()->put('username',$username_check->username);
                    $request->session()->put('user_id',$username_check->id);

                    $request->session()->put('role',$username_check->role);

                    Alert::success('Success', 'Welcome, ' . $username_check->username);
                    return redirect()->route('Po_form_show');}
               

                if($username_check['role'] == 'Admin Approval'){
                    $request->session()->put('user',$username_check);
                    $request->session()->put('username',$username_check->username);
                    $request->session()->put('role',$username_check->role);
                    $level = $username_check->positions()->orderBy('level')->first();                    

                    Alert::success('Success', 'Welcome, ' . $username_check->username);
                    return redirect()->route('App_form_show', ['level' => $level]);}


                if($username_check['role'] == 'Admin Mrv'){
                    $request->session()->put('username',$username_check->username);
                    $request->session()->put('role',$username_check->role);

                    Alert::success('Success', 'Welcome, ' . $username_check->username);
                    return redirect()->route('Po_form_show');}

                else{
                    return redirect()->back()->withErrors(['Account login Failed!']);
                }
            }
            else{
                return redirect()->back()->withErrors(['Account login Failed!']);
            }
        }
        else{
            return redirect()->back()->withErrors(['Account login Failed!']);
        } 
    }
    
    public function logout(Request $request)
    {   
        $request->session()->forget('username', 'role');
        return redirect()->route('login_show');
    }
}
