<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function delete(): RedirectResponse
    {
        $user_id = Auth::user()->getId();
        User::destroy($user_id);
        return redirect()->route('home.index');
    }

}

