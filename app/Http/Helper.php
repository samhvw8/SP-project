<?php
/**
 * Created by PhpStorm.
 * User: samhv
 * Date: 10/16/16
 * Time: 5:11 PM
 */

namespace App\Http;


use App\Models\User;

class Helper
{


    /**
     * Validate password & password confirm are save return true if valid otherwise return false
     * @param $password
     * @param $confirm
     * @return bool
     */
    public static function validatedPassword($password, $confirm)
    {
        return $password == $confirm;
    }


    /**
     * Validate name return true if valid otherwise return false
     * @param $name
     * @return bool
     */
    public static function validatedName($name)
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
    public static function validatedEmail($email)
    {
        // validate email format

        if (!self::checkEmailFormat($email))
            return false;

        // check email exist
        if (self::checkEmailExist($email))
            return false;


        return true;
    }

    /**
     * Check email format return true if valid otherwise return false
     * @param $email
     * @return boolean
     */
    public static function checkEmailFormat($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


    /**
     * Check email exist return true if exist otherwise return false
     * @param $email
     * @return bool
     */
    public static function checkEmailExist($email)
    {
        $user = User::where('email', $email)->first();
        return $user !== null;
    }

    /**
     * Validate data return true if valid otherwise return false
     * @param $data
     * @return array
     */
    public static function validatedData($data)
    {
        $errors = [];
        // validate name
        if (!Helper::validatedName($data['name']))
            array_push($errors, 'Name is not valid');

        // validate email
        if (!Helper::validatedEmail($data['email']))
            array_push($errors, 'Email is not valid');

        // validate password
        if (!Helper::validatedPassword($data['password'], $data['password_confirmation']))
            array_push($errors, 'Password confirmation does not match');

        return $errors;
    }
}