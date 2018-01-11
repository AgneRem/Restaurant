<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        $user = Socialite::driver($driver)->user();
        //patikrina, ar jau yra toks useris, jei ne, sukuria nauja
        $authUser = $this->findOrCreateUser($user, $driver);
        Auth::login($authUser, true);
        return redirect()->to('/');

        // $user->token;
    }

    public function findOrCreateUser($user, $driver)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->provider = $driver;
        $newUser->provider_id = $user->id;
        $newUser->save();
        return $newUser;
    }


}
