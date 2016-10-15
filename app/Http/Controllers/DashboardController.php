<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    /**
     * Show dashboard homepage
     */
    public function index()
    {
        return view('pages.dashboard.index');
    }



}
