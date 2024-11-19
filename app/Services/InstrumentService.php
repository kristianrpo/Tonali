<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class InstrumentService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.instruments_api.base_url');
    }

    public function getAllInstruments()
    {
        try {
            $response = Http::get("{$this->baseUrl}/products");

            if ($response->successful()) {
                return $response->json();
            }

            return [
                'error' => true,
                'message' => __('instrument.fetch_error'),
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => __('instrument.unespected_error').$e->getMessage(),
            ];
        }
    }

    public function getInstrumentById($id)
    {
        try {
            $response = Http::get("{$this->baseUrl}/products/{$id}");

            if ($response->successful()) {
                return $response->json();
            }

            return [
                'error' => true,
                'message' => __('instrument.fetch_error'),
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => __('instrument.unespected_error').$e->getMessage(),
            ];
        }
    }
}
