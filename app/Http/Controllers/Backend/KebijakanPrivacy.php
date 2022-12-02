<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use App\Models\TermsConditions;
use Illuminate\Http\Request;

class KebijakanPrivacy extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Super Admin|Admin']);
    }

    // --------------------------------------------------------- CONTROLLER PRIVACY POLICY ------------------------------------- //
    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::first();

        return view('backend.privacy-policy.index', compact('privacy_policy'));
    }

    public function privacy_policy_store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        PrivacyPolicy::create([
            'deskripsi' => $request->deskripsi,
        ]);

        toast('Privacy Policy Berhasil Ditambahkan', 'success');
        return back();
    }


    public function privacy_policy_update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $privacy_policy = PrivacyPolicy::findOrFail($id);
        $privacy_policy->update([
            'deskripsi' => $request->deskripsi,
        ]);

        toast('Privacy Policy Berhasil Diubah', 'success');
        return back();
    }


    // --------------------------------------------------------- CONTROLLER TERMS CONDITIONS ------------------------------------- //
    public function terms_conditions()
    {
        $terms_conditions = TermsConditions::first();

        return view('backend.terms-conditions.index', compact('terms_conditions'));
    }

    public function terms_conditions_store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        TermsConditions::create([
            'deskripsi' => $request->deskripsi,
        ]);

        toast('Terms & Conditions Berhasil Ditambahkan', 'success');
        return back();
    }


    public function terms_conditions_update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required',
        ]);

        $terms_conditions = TermsConditions::findOrFail($id);
        $terms_conditions->update([
            'deskripsi' => $request->deskripsi,
        ]);

        toast('Terms & Conditions Berhasil Diubah', 'success');
        return back();
    }
}
