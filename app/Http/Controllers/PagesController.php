<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    /**
     * Show dashboard homepage
     */
    public function dashboard()
    {
        return view('pages.dashboard.index');
    }

    public function underContruction()
    {
        return response()->view('errors.default', ['error' => 'page under construction', 'status' => ' '], 200);
    }

}
