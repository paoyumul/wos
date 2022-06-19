<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return inertia('Home', []);
    }
}
