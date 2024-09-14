<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['image'] - string - contains the product image filename or URL
     * $this->attributes['price'] - decimal - contains the product price with two decimal places (e.g., 19.99)
     * $this->attributes['description'] - text - contains the product description
     * $this->attributes['brand'] - string - contains the product brand name
     * $this->attributes['stock_quantity'] - int - contains the product stock quantity
     * $this->attributes['quantity_reviews'] - int - contains the product review count
     * $this->attributes['sum_ratings'] - int - contains the product total ratings
     * $this->attributes['category_id'] - int - contains the product category id
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     */
    protected $fillable = ['name', 'image', 'price', 'description', 'brand'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'description' => 'required',
            'brand' => 'required',
        ]);
    }

    /*public function category()
    {
        return $this->belongsTo(Category::class);
    }*/

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getImage(): ?string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }

    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }

    public function getStockQuantity(): int
    {
        return $this->attributes['stock_quantity'];
    }

    public function setStockQuantity(int $stockQuantity): void
    {
        $this->attributes['stock_quantity'] = $stockQuantity;
    }

    public function getQuantityReviews(): int
    {
        return $this->attributes['quantity_reviews'];
    }

    public function getSumRatings(): int
    {
        return $this->attributes['sum_ratings'];
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function getCreatedAt(): mixed
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): mixed
    {
        return $this->attributes['updated_at'];
    }
}
