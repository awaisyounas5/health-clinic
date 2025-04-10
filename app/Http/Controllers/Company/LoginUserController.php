<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        $logged_in_users=User::where('created_by',Auth::user()->id)->whereNotNull('login_status')->get();
        return view('company.manage_logins.view',compact('logged_in_users'));
    }

    public function logged_in_users(){
        $logged_in_users=User::where('created_by',Auth::user()->id)->get();
        return view('company.manage_logins.login-history',compact('logged_in_users'));
    }
}
