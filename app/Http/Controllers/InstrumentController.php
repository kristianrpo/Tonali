<?php

namespace App\Http\Controllers;

use App\Services\InstrumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class InstrumentController extends Controller
{
    protected $instrumentService;

    public function __construct(InstrumentService $instrumentService)
    {
        $this->instrumentService = $instrumentService;
    }

    public function index(): View|JsonResponse
    {
        $viewData = [];
        $viewData['instruments'] = $this->instrumentService->getAllInstruments();
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('layoutApp.instruments'), 'url' => null],
        ];

        if ($viewData['instruments']) {
            return view('instrument.index')->with('viewData', $viewData);
        }

        return response()->json(['error' => __('instrument.error')], 500);
    }

    public function show(int $id): View|JsonResponse
    {
        $viewData = [];
        $viewData['instrument'] = $this->instrumentService->getInstrumentById($id);
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('layoutApp.instruments'), 'url' => route('instrument.index')],
            ['label' => $viewData['instrument']['name'], 'url' => null],
        ];

        if ($viewData['instrument']) {
            return view('instrument.show')->with('viewData', $viewData);
        }

        return response()->json(['error' => __('instrument.not_found')], 404);
    }
}
