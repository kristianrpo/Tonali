<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
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

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function authenticated(Request $request, $user): RedirectResponse
    {
        if ($user->getRole() === 'admin') {
            return redirect()->route('admin.index'); // Ruta del admin
        } elseif ($user->getRole() === 'customer') {
            return redirect()->route('home.index'); // Ruta de los productos
        }

        //return redirect($this->redirectTo); Redirigir a una ruta por defecto
    }
}
