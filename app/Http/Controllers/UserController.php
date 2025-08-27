<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function UserRegister (Request $req){
    $values =   $req->validate([
            'username' => 'required|string|min:5',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'UserType' => 'required'
        ]);
        
    
       $values['password'] = bcrypt($req['password']);

       User::create($values);

       return redirect('/userreg')->with('success','Registration success');
    
    }

    public function login(Request $req)
    {
        $values = $req->validate([
            'username' => 'required',
            'password' => 'required',
            'UserType' => 'required'
        ]); 
    
        if (auth()->attempt([
            'username' => $values['username'],
            'password' => $values['password'],
            'UserType' => $values['UserType']    
            ])) {
           
                $req->session()->regenerate();
    
            switch ($values['UserType']) {
                case 'admin':
                    return redirect('/1')->with('success', 'Welcome'.' '. $values['username']);
                case 'cllrc':
                    return redirect('/cl')->with('success', 'Welcome'.' '. $values['username']);
                case 'hslrc':
                    return redirect('/hs')->with('success', 'Welcome'.' '. $values['username']);
                case 'pslrc':
                    return redirect('/ps')->with('success', 'Welcome'.' '. $values['username']);
                case 'gslrc':
                    return redirect('/gs')->with('success', 'Welcome'.' '. $values['username']);
                default:
                    break;
            }
        }

        return redirect('/')->with('failure', 'Invalid username, password, or user type');
    }
    
    public function logout(){
        auth()->logout();
        return redirect('/')->with('logout', 'You are Logged Out');
    }


}
