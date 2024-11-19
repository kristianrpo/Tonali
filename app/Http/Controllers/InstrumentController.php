<?php

namespace App\Http\Controllers;

use App\Services\InstrumentService;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class InstrumentController extends Controller
{
    protected $instrumentService;

    public function __construct(InstrumentService $instrumentService)
    {
        $this->instrumentService = $instrumentService;
    }

    public function index(): View
    {
        $viewData = [];
        $instruments = $this->instrumentService->getAllInstruments();

        if (isset($instruments['error']) && $instruments['error'] === true) {
            Session::flash('error', $instruments['message']);
            $viewData['instruments'] = [];
        } else {
            $viewData['instruments'] = $instruments;
        }

        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('layoutApp.instruments'), 'url' => null],
        ];

        return view('instrument.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $instrument = $this->instrumentService->getInstrumentById($id);

        if (isset($instrument['error']) && $instrument['error'] === true) {
            Session::flash('error', $instrument['message']);
            $viewData['instrument'] = null;
            $viewData['breadcrumbs'] = [
                ['label' => __('layoutApp.home'), 'url' => route('home.index')],
                ['label' => __('layoutApp.instruments'), 'url' => route('instrument.index')],
            ];
        } else {
            $viewData['instrument'] = $instrument;
            $viewData['breadcrumbs'] = [
                ['label' => __('layoutApp.home'), 'url' => route('home.index')],
                ['label' => __('layoutApp.instruments'), 'url' => route('instrument.index')],
                ['label' => $viewData['instrument']['name'], 'url' => null],
            ];
        }

        return view('instrument.show')->with('viewData', $viewData);
    }
}
