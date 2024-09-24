<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);

        $viewData = [];
        $viewData['title'] = __('controller.titles.profile');
        $viewData['subtitle'] = __('controller.profile_information');
        $viewData['user'] = $user;

        if ($user->getRole() === 'admin') {
            return view('admin.profile')->with('viewData', $viewData);
        } elseif ($user->getRole() === 'customer') {
            return view('customer.profile')->with('viewData', $viewData);
        }
    }

    public function edit(): View
    {
        $viewData = [];
        $userId = Auth::user()->getId();
        $user = User::findOrFail($userId);
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

        return redirect()->route('profile.index');
    }

    public function delete(): RedirectResponse
    {
        $userId = Auth::user()->getId();
        User::destroy($userId);


        return redirect()->route('home.index');
    }

}