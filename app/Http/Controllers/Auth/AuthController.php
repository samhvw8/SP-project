<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;


class AuthController extends Controller
{
    /**
     * Show Register Form
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     *  Register Function
     */
    public function postRegister(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        // validate data
        // create user
        // redirect
    }

    /**
     * @param $email
     */
    private function checkEmailValidation($email)
    {

    }
}
