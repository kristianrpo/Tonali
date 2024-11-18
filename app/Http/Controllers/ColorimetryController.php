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
        $viewData = [];
        $viewData['colorimetry'] = Colorimetry::where('user_id', Auth::user()->getId())->first();
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('colorimetry.colorimetry'), 'url' => null],
        ];
        

        return view('colorimetry.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('colorimetry.colorimetry'), 'url' => route('colorimetry.index')],
            ['label' => __('colorimetry.create'), 'url' => null],
        ];
        return view('colorimetry.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = Auth::user()->getId();
        Colorimetry::validate($request);

        $colorimetry = new Colorimetry;
        $colorimetry->setSkinTone($request->input('skin_tone'));
        $colorimetry->setSkinUndertone($request->input('skin_undertone'));
        $colorimetry->setHairColor($request->input('hair_color'));
        $colorimetry->setEyeColor($request->input('eye_color'));
        $specificNeeds = $request->input('specific_needs', []);
        $colorimetry->setSpecificNeeds(json_encode($specificNeeds));
        $colorimetry->setUserId($userId);
        $colorimetry->save();

        Session::flash('success', __('colorimetry.create_success'));

        return redirect()->route('colorimetry.index');

    }

    public function edit(int $id): View
    {

        $colorimetry = Colorimetry::findOrFail($id);

        $selectedNeeds = json_decode($colorimetry->getSpecificNeeds(), true);

        $viewData = [];
        $viewData['colorimetry'] = $colorimetry;
        $viewData['selected_needs'] = $selectedNeeds;
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('colorimetry.colorimetry'), 'url' => route('colorimetry.index')],
            ['label' => __('colorimetry.edit'), 'url' => null],
        ];

        return view('colorimetry.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $colorimetry = Colorimetry::findOrFail($id);
        Colorimetry::validate($request);

        $colorimetry->setSkinTone($request->input('skin_tone'));
        $colorimetry->setSkinUndertone($request->input('skin_undertone'));
        $colorimetry->setHairColor($request->input('hair_color'));
        $colorimetry->setEyeColor($request->input('eye_color'));
        $specificNeeds = $request->input('specific_needs', []);
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
