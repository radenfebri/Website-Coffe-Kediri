<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('frontend.home.index');
    }
}
