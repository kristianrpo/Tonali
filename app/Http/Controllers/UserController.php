<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);

        $viewData = [];
        $viewData['user'] = $user;

        if ($user->getRole() === 'admin') {
            return view('admin.profile')->with('viewData', $viewData);
        } elseif ($user->getRole() === 'customer') {
            return view('customer.profile')->with('viewData', $viewData);
        }
    }

    public function edit(): View
    {
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);

        $viewData = [];
        $viewData['user'] = $user;

        if ($user->getRole() === 'admin') {
            return view('admin.edit')->with('viewData', $viewData);
        } elseif ($user->getRole() === 'customer') {
            return view('customer.edit')->with('viewData', $viewData);
        }
    }

    public function update(Request $request): RedirectResponse
    {
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);
        User::validate($request);

        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setCellphone($request->input('cellphone'));
        $user->setAddress($request->input('address'));
        $user->save();

        Session::flash('success', __('user.update_success'));

        return redirect()->route('profile.index');
    }

    public function delete(): RedirectResponse
    {
        $userId = Auth::user()->getId();
        User::destroy($userId);

        Session::flash('success', __('user.delete_success'));

        return redirect()->route('home.index');
    }
}
