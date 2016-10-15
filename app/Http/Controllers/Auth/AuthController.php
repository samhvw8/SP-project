<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{


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

        $errors = $this->validatedData($data);
        if (!empty($errors)) {
            $request->session()->flash('errors', $errors);
            return redirect()->back()->withInput($request->except('password'));
        }

        // create user
        $this->createUser($data);

        // redirect
        return redirect('/');
    }

    /**
     * Validate data return true if valid otherwise return false
     * @param $data
     * @return array
     */
    private function validatedData($data)
    {
        $errors = [];
        // validate name
        if (!$this->validatedName($data['name']))
            array_push($errors, 'Name is not valid');

        // validate email
        if (!$this->validatedEmail($data['email']))
            array_push($errors, 'Email is not valid');

        // validate password
        if (!$this->validatedPassword($data['password'], $data['password_confirmation']))
            array_push($errors, 'Password confirmation does not match');

        return $errors;
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

    /**
     * Validate password & password confirm are save return true if valid otherwise return false
     * @param $password
     * @param $confirm
     * @return bool
     */
    private function validatedPassword($password, $confirm)
    {
        return $password == $confirm;
    }


    /**
     * Validate name return true if valid otherwise return false
     * @param $name
     * @return bool
     */
    private function validatedName($name)
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $name) || empty($name))
            return false;

        return true;
    }

    /**
     * Validate email return true if valid otherwise return false
     * @param $email
     * @return bool
     */
    private function validatedEmail($email)
    {
        // validate email format

        if (!$this->checkEmailFormat($email))
            return false;

        // check email exist
        if ($this->checkEmailExist($email))
            return false;


        return true;
    }

    /**
     * Check email format return true if valid otherwise return false
     * @param $email
     * @return boolean
     */
    private function checkEmailFormat($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    /**
     * Check email exist return true if exist otherwise return false
     * @param $email
     * @return bool
     */
    public function checkEmailExist($email)
    {
        $user = User::where('email', $email)->first();
        return $user !== null;
    }
}
