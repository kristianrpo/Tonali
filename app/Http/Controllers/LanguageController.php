<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change(Request $request): RedirectResponse
    {
        $lang = $request->input('lang');
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
