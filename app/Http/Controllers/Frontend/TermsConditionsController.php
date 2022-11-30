<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class TermsConditionsController extends Controller
{
    public function index()
    {
        $kategoriproduk_nav = KategoriProduk::latest()->where('popular', 1)->where('is_active', 1)->get();
    
        return view('frontend.termsConditions.index', compact('kategoriproduk_nav'));
    }

}
