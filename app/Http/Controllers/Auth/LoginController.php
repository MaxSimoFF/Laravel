<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // I overrided this method to change login info from email to Mobile.
    public function username()
    {
        // Get the value or input name identify.
        $value = request()->input('identify');

        // validate input to know which login will be process email or mobile.
        $field = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        // add column nanme and value to request like: ['email' => 'moustafa@gmail.com].
        request()->merge([$field => $value]);

        return $field;

        // return 'mobile';
    }
}
