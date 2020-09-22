<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index() {
        //$request->user()->authorizeRoles(['admin', 'user']);
        return view('home.index');
    }
}
