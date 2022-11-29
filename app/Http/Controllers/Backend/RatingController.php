<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }


    public function index()
    {
        $rating = Rating::where('status', 1)->latest()->get();
        return view('backend.rating.index', compact('rating'));
    }


    public function nonactive()
    {
        $rating = Rating::where('status', 0)->latest()->get();
        return view('backend.rating.nonactive', compact('rating'));
    }


    public function edit($id)
    {
        $rating = Rating::findOrFail(decrypt($id));
        return view('backend.rating.edit', compact('rating'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'stars_rated' => 'required|min:1|max:5',
            'status' => 'required',
        ]);

        $rating = Rating::findOrFail($id);
        $rating->update([
            'stars_rated' => $request->stars_rated,
            'status' => $request->status,
            'user_review' => $request->user_review,
        ]);

        toast('Rating Updated Successfully', 'success');
        return redirect()->route('rating.index');
    }
}
