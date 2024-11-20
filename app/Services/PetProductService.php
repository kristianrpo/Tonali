<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PetProductService
{
    protected static $baseUrl;

    protected static function init()
    {
        if (! self::$baseUrl) {
            self::$baseUrl = config('services.pet_products_api.base_url');
        }
    }

    public static function getAllPetProducts()
    {
        self::init();

        try {
            $response = Http::get(self::$baseUrl.'/products');
            $response = Http::get(self::$baseUrl.'/products');

            if ($response->successful()) {
                return $response->json();
            }

            return [
                'error' => true,
                'message' => __('petProduct.fetch_error'),
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => __('petProduct.unespected_error').$e->getMessage(),
            ];
        }
    }

    public static function getPetProductById($id)
    {
        self::init();

        try {
            $response = Http::get(self::$baseUrl."/products/{$id}");
            $response = Http::get(self::$baseUrl."/products/{$id}");

            if ($response->successful()) {
                return $response->json();
            }

            return [
                'error' => true,
                'message' => __('petProduct.fetch_error'),
                'status' => $response->status(),
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => __('petProduct.unespected_error').$e->getMessage(),
            ];
        }
    }
}
