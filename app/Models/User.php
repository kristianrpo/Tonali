<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use illuminate\Support\Collection;

class User extends Authenticatable
{
    /*
    * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['cellphone'] - string - contains the user cellphone
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['role'] - string - contains the user role (customer or admin)
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['remember_token'] - string - contains the user remember token
     * $this->orders - Order[] - contains the associated orders
     * $this->reviews - Review[] - contains the associated reviews
     * $this->colorimetry - Colorimetry - contains the associated colorimetry
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'cellphone', 
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'cellphone' => '0',
        'address' => '#',
        'role' => 'customer',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

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

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getCellphone(): string
    {
        return $this->attributes['cellphone'];
    }

    public function setCellphone(string $cellphone): void
    {
        $this->attributes['cellphone'] = $cellphone;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getEmailVerifiedAt(): string
    {
        return $this->attributes['email_verified_at'];
    }

    public function getRememberToken(): ?string
    {
        return $this->attributes['remember_token'];
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders($orders): void
    {
        $this->orders = $orders;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews($reviews): void
    {
        $this->reviews = $reviews;
    }
    
    public function colorimetry(): HasOne
    {
        return $this->hasOne(Colorimetry::class);
    }

    public function getColorimetry(): Colorimetry
    {
        return $this->colorimetry;
    }

    public function setColorimetry(Colorimetry $colorimetry): void
    {
        $this->colorimetry = $colorimetry;
    }

    public static function validate(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'cellphone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);
    }
}
