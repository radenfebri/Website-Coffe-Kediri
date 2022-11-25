<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('frontend.pembayaran.index');
    }
}
