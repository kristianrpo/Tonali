<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index');
    }

    public function delete(): RedirectResponse
    {
        $userId = Auth::user()->getId();
        User::destroy($userId);
        Session::flash('success', __('user.delete_success'));

        return redirect()->route('home.index');
    }
}
