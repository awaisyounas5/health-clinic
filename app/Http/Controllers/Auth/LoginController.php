<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    protected function authenticated(Request $request, $user)
    {

        $user->update([
            'login_status'=>'login',
            'longitude'=>$request->longitude,
            'latitude'=>$request->latitude,
            ]);
        if ($user->status !== 'approved') {
            Auth::logout(); // Logout the user
            return redirect()->route('login')->with('status', 'Your registration request has been received. Please wait for approval.');
        }

        if ($user->hasRole('company')) {
            return redirect()->route('company.dashboard');
        }
        elseif ($user->hasRole('super_admin')) {
            return redirect()->route('admin.dashboard');
        }
        elseif (Auth::user()->hasRole('staff_member')) {
            return redirect()->route('staff_member.dashboard');
        }
        elseif (Auth::user()->hasRole('manager')) {
            return redirect()->route('manager.dashboard');
        }
        elseif (Auth::user()->hasRole('patient')) {
            return redirect()->route('patient.dashboard');
        }


    }
    public function logout(Request $request)
    {
        // Add your logic to update the user field here
        $user = Auth::user();
        $user->update([
            'login_status'=>'logout',
        ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
