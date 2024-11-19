<?php

namespace App\Http\Controllers;

use App\Services\PetProductService;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PetProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $petProducts = PetProductService::getAllPetProducts();

        if (isset($petProducts['error']) && $petProducts['error'] === true) {
            Session::flash('error', $petProducts['message']);
            $viewData['petProducts'] = [];
        } else {
            $viewData['petProducts'] = $petProducts;
        }

        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('layoutApp.pet_products'), 'url' => null],
        ];

        return view('petProduct.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $petProduct = PetProductService::getPetProductById($id);

        if (isset($petProduct['error']) && $petProduct['error'] === true) {
            Session::flash('error', $petProduct['message']);
            $viewData['petProduct'] = null;
            $viewData['breadcrumbs'] = [
                ['label' => __('layoutApp.home'), 'url' => route('home.index')],
                ['label' => __('layoutApp.pet_products'), 'url' => route('petProduct.index')],
            ];
        } else {
            $viewData['petProduct'] = $petProduct;
            $viewData['breadcrumbs'] = [
                ['label' => __('layoutApp.home'), 'url' => route('home.index')],
                ['label' => __('layoutApp.pet_products'), 'url' => route('petProduct.index')],
                ['label' => $viewData['petProduct']['name'], 'url' => null],
            ];
        }

        return view('petProduct.show')->with('viewData', $viewData);
    }
}
