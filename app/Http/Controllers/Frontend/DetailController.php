<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function __construct()
    {
    }

    public function index($slug)
    {
        return view('frontend.detail.index');
    }
}
