<?php

namespace App\Http\Controllers;

use App\Models\Colorimetry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ColorimetryController extends Controller
{
    public function index(): View
    {
        $userId = Auth::user()->getId();
        $colorimetry = Colorimetry::where('user_id', $userId)->first();
        $viewData = [];
        $viewData['colorimetry'] = $colorimetry;

        return view('customer.colorimetry.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create colorimetry';

        return view('customer.colorimetry.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $userId = Auth::user()->getId();
        Colorimetry::validate($request);

        $colorimetry = new Colorimetry;
        $colorimetry->setSkinTone($request->input('skinTone'));
        $colorimetry->setSkinUndertone($request->input('skinUndertone'));
        $colorimetry->setHairColor($request->input('hairColor'));
        $colorimetry->setEyeColor($request->input('eyeColor'));
        $specificNeeds = $request->input('specificNeeds', []);
        $colorimetry->setSpecificNeeds(json_encode($specificNeeds));
        $colorimetry->setUserId($userId);
        $colorimetry->save();

        Session::flash('success', __('colorimetry.create_success'));

        return redirect()->route('colorimetry.index');

    }

    public function edit(int $id): View
    {
        $viewData = [];
        $colorimetry = Colorimetry::findOrFail($id);
        $selectedNeeds = json_decode($colorimetry->getSpecificNeeds(), true);
        $viewData['colorimetry'] = $colorimetry;
        $viewData['selectedNeeds'] = $selectedNeeds;

        return view('customer.colorimetry.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $colorimetry = Colorimetry::findOrFail($id);
        Colorimetry::validate($request);

        $colorimetry->setSkinTone($request->input('skinTone'));
        $colorimetry->setSkinUndertone($request->input('skinUndertone'));
        $colorimetry->setHairColor($request->input('hairColor'));
        $colorimetry->setEyeColor($request->input('eyeColor'));
        $specificNeeds = $request->input('specificNeeds', []);
        $colorimetry->setSpecificNeeds(json_encode($specificNeeds));
        $colorimetry->save();

        Session::flash('success', __('colorimetry.edit_success'));

        return redirect()->route('colorimetry.index');
    }

    public function delete(int $id): RedirectResponse
    {
        Colorimetry::destroy($id);

        Session::flash('success', __('colorimetry.delete_success'));

        return redirect()->route('colorimetry.index');
    }
}
