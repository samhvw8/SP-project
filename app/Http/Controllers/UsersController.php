<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Helper;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('pages.dashboard.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'is_admin' => $request->input('is_admin'),
        ];

        // validate data
        $errors = Helper::validatedData($data);
        if (!empty($errors)) {
            $request->session()->flash('errors', $errors);
            return redirect()->back()->withInput($request->except('password'));
        }

        // create user
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if ($data['is_admin'] === 'true')
            $user->is_admin = true;

        // save user
        $user->save();

        // redirect to
        return redirect('/dashboard/users');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            // if user is found
            // return the view edit
            return view('pages.dashboard.updateUser', ['user' => $user]);
        }

        // $user not found

        return response()->view('errors.default', ['error' => 'User not found', 'status' => '404'], 404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'is_admin' => $request->input('is_admin'),
        ];

        // validate data
        $errors = $this->validatedData($data);

        if (!empty($errors)) {
            $request->session()->flash('errors', $errors);
            return redirect()->back()->withInput($request->except('password'));
        }



        // Edit user
        // find user
        $user = User::find($id);
        // check user
        $user->name = $data['name'];
        $user->password = bcrypt($data['password']);
        if ($data['is_admin'] === 'true')
            $user->is_admin = true;

        // save user
        $user->save();

        // redirect to
        return redirect('/dashboard/users');
    }

    private function validatedData($data)
    {
        $errors = [];
        // validate name
        if (!Helper::validatedName($data['name']))
            array_push($errors, 'Name is not valid');

        // validate password
        if (!Helper::validatedPassword($data['password'], $data['password_confirmation']))
            array_push($errors, 'Password confirmation does not match');

        return $errors;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check $id exist
        $user = User::find($id);

        if ($user !== null)
            $user->delete();

        //
        return redirect()->back();
    }
}
