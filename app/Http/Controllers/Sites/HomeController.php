<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('sites.home.index');
    }
}
