<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductService
{
    public function getCommonData(Collection $products): array
    {
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');
        $categories = Category::all();
        $products = $products;

        return [
            'products' => $products,
            'categories' => $categories,
            'priceRanges' => [
                'min' => intval($minPrice),
                'first_tercile' => intval($minPrice + ($maxPrice - $minPrice) / 3),
                'second_tercile' => intval($minPrice + 2 * ($maxPrice - $minPrice) / 3),
                'max' => intval($maxPrice),
            ],
        ];
    }

    public function searchProducts(string $query)
    {
        return Product::where('name', 'like', '%'.$query.'%')
            ->orWhere('brand', 'like', '%'.$query.'%');
    }

    public function filterProducts(array $filters)
    {
        $query = Product::query();

        if (isset($filters['category_id'])) {
            $query->whereIn('category_id', (array) $filters['category_id']);
        }

        if (isset($filters['rating'])) {
            $ratings = implode(',', $filters['rating']);
            $query->whereRaw('FLOOR(sum_ratings / quantity_reviews) IN ('.$ratings.')');
        }

        if (isset($filters['price_range'])) {
            $query->where(function ($query) use ($filters) {
                foreach ($filters['price_range'] as $range) {
                    [$min, $max] = explode('-', $range);
                    $query->orWhereBetween('price', [(int) $min, (int) $max]);
                }
            });
        }

        if (isset($filters['stock_quantity'])) {
            $query->where(function ($query) use ($filters) {
                if (in_array('in_stock', $filters['stock_quantity'])) {
                    $query->orWhere('stock_quantity', '>=', 1);
                }

                if (in_array('out_of_stock', $filters['stock_quantity'])) {
                    $query->orWhere('stock_quantity', '=', 0);
                }
            });
        }

        return $query;
    }
}
