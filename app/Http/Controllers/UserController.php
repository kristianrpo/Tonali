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
        $user = Auth::user();

        $viewData = [];
        $viewData['user'] = $user;
        $viewData['breadcrumbs'] = [];

        if ($user->getRole() === 'admin') {
            $viewData['breadcrumbs'][] = ['label' => __('admin.admin'), 'url' => route('admin.index')];
        } elseif ($user->getRole() === 'customer') {
            $viewData['breadcrumbs'][] = ['label' => __('layoutApp.home'), 'url' => route('home.index')];
        }

        $viewData['breadcrumbs'][] =    ['label' => __('user.profile'), 'url' => null];

        if ($user->getRole() === 'admin') {
            return view('admin.profile')->with('viewData', $viewData);
        } elseif ($user->getRole() === 'customer') {
            return view('customer.profile')->with('viewData', $viewData);
        }
    }

    public function edit(): View
    {
        $user = Auth::user();

        $viewData = [];
        $viewData['user'] = $user;
        $viewData['breadcrumbs'] = [];

        if ($user->getRole() === 'admin') {
            $viewData['breadcrumbs'][] = ['label' => __('admin.admin'), 'url' => route('admin.index')];
        } elseif ($user->getRole() === 'customer') {
            $viewData['breadcrumbs'][] = ['label' => __('layoutApp.home'), 'url' => route('home.index')];
        }

        $viewData['breadcrumbs'][] = ['label' => __('layoutApp.home'), 'url' => route('home.index')];
        $viewData['breadcrumbs'][] = ['label' => __('user.profile'), 'url' => route('profile.index')];
        $viewData['breadcrumbs'][] = ['label' => __('user.edit_profile'), 'url' => null];


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

        Auth::logout();
        Session::flush();

        Session::flash('success', __('user.delete_success'));

        return redirect()->route('home.index');
    }
}
