<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Helper;

class AuthController extends Controller
{

    /**
     * Logout function
     */
    public function getLogout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect('/');
    }

    /**
     * Show Login page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (Auth::check()) {
            return view('pages.home');
        }
        return view('pages.login');
    }


    /**
     *  Login function
     */
    public function postLogin(Request $request)
    {
        // Get data from request
        $email = $request->input('email');
        $password = $request->input('password');


        // login
        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            // Authentication passed...
            if(Auth::user()->isAdmin()) {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('/');
        }

        // Authentication not passed

        $request->session()->flash('errors', 'email not exist or password not corrected');
        return redirect()->back()->withInput($request->except('password'));


    }

    /**
     * Show Register Form
     */
    public function getRegister()
    {
        return view('pages.register');
    }

    /**
     *  Register Function
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postRegister(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation')
        ];

        $errors = Helper::validatedData($data);
        if (!empty($errors)) {
            $request->session()->flash('errors', $errors);
            return redirect()->back()->withInput($request->except('password'));
        }

        // create user
        $user = $this->createUser($data);
        Auth::login($user);
        // redirect
        return redirect('/');
    }

    /**
     * Create a new user with given data
     * @param $data
     * @return User
     */
    private function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

}
