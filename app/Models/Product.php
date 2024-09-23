<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Product extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['image'] - string - contains the product image filename or URL
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['description'] - text - contains the product description
     * $this->attributes['brand'] - string - contains the product brand name
     * $this->attributes['stock_quantity'] - int - contains the product stock quantity
     * $this->attributes['quantity_reviews'] - int - contains the product review count
     * $this->attributes['sum_ratings'] - int - contains the product total ratings
     * $this->attributes['category_id'] - int - contains the referenced category id
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     * $this->items - Item[] - contains the associated items
     * $this->reviews - Review[] - contains the associated reviews
     * $this->category - Category - contains the associated category
     */
    protected $fillable = ['name', 'image', 'price', 'description', 'brand', 'stock_quantity'];

    protected $attributes = [
        'image' => 'default.png',
        'quantity_reviews' => 0,
        'sum_ratings' => 0,
    ];

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

    public function getImage(): string
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

    public function setQuantityReviews(int $quantityReviews): void
    {
        $this->attributes['quantity_reviews'] = $quantityReviews;
    }

    public function getSumRatings(): int
    {
        return $this->attributes['sum_ratings'];
    }

    public function setSumRatings(int $sumRatings): void
    {
        $this->attributes['sum_ratings'] = $sumRatings;
    }

    public function getCategoryId(): int
    {
        return $this->attributes['category_id'];
    }

    public function setCategoryId(int $categoryId): void
    {
        $this->attributes['category_id'] = $categoryId;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getAverageRating(): float
    {
        return $this->getQuantityReviews() === 0 ? 0 : number_format($this->getSumRatings() / $this->getQuantityReviews(), 2);
    }

    public function getImageUrl(): string
    {
        return $this->attributes['image'] === 'default.png'
            ? asset('img/product/'.$this->attributes['image'])
            : asset('storage/products/'.$this->attributes['image']);
    }

    public function addReviewWithRating(int $rating): void
    {
        $this->setSumRatings($this->getSumRatings() + $rating);
        $this->setQuantityReviews($this->getQuantityReviews() + 1);
        $this->save();
    }

    public function deleteReviewWithRating(int $rating): void
    {
        $this->setSumRatings($this->getSumRatings() - $rating);
        $this->setQuantityReviews($this->getQuantityReviews() - 1);
        $this->save();
    }

    public function updateReviewWithRating(int $oldRating, int $newRating): void
    {
        $this->setSumRatings($this->getSumRatings() - $oldRating + $newRating);
        $this->save();
    }

    public static function sumPricesByQuantities(Collection $products, array $productsInSession): int
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public static function getPriceTerciles(): array
    {
        $minPrice = Product::min('price');
        $maxPrice = Product::max('price');

        return [
            'min' => intval($minPrice),
            'first_tercile' => intval($minPrice + ($maxPrice - $minPrice) / 3),
            'second_tercile' => intval($minPrice + 2 * ($maxPrice - $minPrice) / 3),
            'max' => intval($maxPrice),
        ];
    }

    public function getRelatedProducts(int $limit = 5): Collection
    {
        $recommended = Product::where('category_id', $this->category_id)
            ->where('brand', $this->brand)
            ->where('id', '!=', $this->id)
            ->limit($limit)
            ->get();

        if ($recommended->count() < $limit) {
            $additionalProducts = Product::where('category_id', $this->category_id)
                ->where('id', '!=', $this->id)
                ->whereNotIn('id', $recommended->pluck('id'))
                ->limit($limit - $recommended->count())
                ->get();

            $recommended = $recommended->merge($additionalProducts);
        }

        if ($recommended->count() < $limit) {
            $additionalProducts = Product::where('brand', $this->brand)
                ->where('id', '!=', $this->id)
                ->whereNotIn('id', $recommended->pluck('id'))
                ->limit($limit - $recommended->count())
                ->get();

            $recommended = $recommended->merge($additionalProducts);
        }

        return $recommended;
    }

    public static function getSuggestionsByName(string $query): Collection
    {
        return Product::where('name', 'like', $query.'%')->distinct()->pluck('name');
    }

    public static function search(string $query): Builder
    {
        return Product::where('name', 'like', '%'.$query.'%')
            ->orWhere('brand', 'like', '%'.$query.'%');
    }

    public static function filter(array $filters): Builder
    {
        $query = Product::query();
        $filterMethods = self::getFilterMethods();

        foreach ($filters as $key => $value) {
            if (isset($filterMethods[$key])) {
                $filterMethods[$key]($query, $value);
            }
        }

        return $query;
    }

    private static function getFilterMethods(): array
    {
        return [
            'category_id' => function (Builder $query, $categoryId) {
                $query->whereIn('category_id', (array) $categoryId);
            },
            'rating' => function (Builder $query, $ratings) {
                $ratings = implode(',', $ratings);
                $query->whereRaw('FLOOR(sum_ratings / quantity_reviews) IN ('.$ratings.')');
            },
            'price_range' => function (Builder $query, array $priceRange) {
                $query->where(function ($query) use ($priceRange) {
                    foreach ($priceRange as $range) {
                        [$min, $max] = explode('-', $range);
                        $query->orWhereBetween('price', [(int) $min, (int) $max]);
                    }
                });
            },
            'stock_quantity' => function (Builder $query, array $stockQuantity) {
                $query->where(function ($query) use ($stockQuantity) {
                    if (in_array('in_stock', $stockQuantity)) {
                        $query->orWhere('stock_quantity', '>=', 1);
                    }
                    if (in_array('out_of_stock', $stockQuantity)) {
                        $query->orWhere('stock_quantity', '=', 0);
                    }
                });
            },
        ];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric|gt:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
            'description' => 'required|string|min:20|max:255',
            'brand' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'stock_quantity' => 'required|numeric|gte:0',
        ]);
    }
}
