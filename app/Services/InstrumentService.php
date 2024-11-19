<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class InstrumentService
{
    protected static $baseUrl;

    protected static function init()
    {
        if (! self::$baseUrl) {
            self::$baseUrl = config('services.instruments_api.base_url');
        }
    }

    public static function getAllInstruments()
    {
        self::init();

        try {
            $response = Http::get(self::$baseUrl.'/products');

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

    public static function getInstrumentById($id)
    {
        self::init();

        try {
            $response = Http::get(self::$baseUrl."/products/{$id}");

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
