<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'image' => $this->getImage(),
            'price' => $this->getPrice(),
            'description' => $this->getDescription(),
            'brand' => $this->getBrand(),
            'stock_quantity' => $this->getStockQuantity(),
            'average_rating' => $this->getAverageRating(),
            'url' => route('product.show', $this->getId()),
        ];
    }
}
