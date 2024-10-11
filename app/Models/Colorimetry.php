<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Colorimetry extends Model
{
    /**
     * COLORIMETRY ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['skin_tone'] - string - contains the customer skin tone
     * $this->attributes['skin_undertone'] - string - contains the customer skin undertone
     * $this->attributes['hair_color'] - string - contains the customer hair color
     * $this->attributes['eye_color'] - string - contains the customer eye color
     * $this->attributes['specific_needs'] - string - contains the customer specific needs, optional
     * $this->attributes['created_at'] - string - contains the date of creation
     * $this->attributes['updated_at'] - string - contains the date of update
     * $this->attributes['user_id'] - int - contains the ID of the user to which the colorimetry belongs
     */
    protected $fillable = [
        'customer_name',
        'skin_tone',
        'skin_undertone',
        'hair_color',
        'eye_color',
        'specific_needs',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getSkinTone(): string
    {
        return $this->attributes['skin_tone'];
    }

    public function setSkinTone(string $skinTone): void
    {
        $this->attributes['skin_tone'] = $skinTone;
    }

    public function getSkinUndertone(): string
    {
        return $this->attributes['skin_undertone'];
    }

    public function setSkinUndertone(string $skinUndertone): void
    {
        $this->attributes['skin_undertone'] = $skinUndertone;
    }

    public function getHairColor(): string
    {
        return $this->attributes['hair_color'];
    }

    public function setHairColor(string $hairColor): void
    {
        $this->attributes['hair_color'] = $hairColor;
    }

    public function getEyeColor(): string
    {
        return $this->attributes['eye_color'];
    }

    public function setEyeColor(string $eyeColor): void
    {
        $this->attributes['eye_color'] = $eyeColor;
    }

    public function getSpecificNeeds(): string
    {
        return $this->attributes['specific_needs'];
    }

    public function setSpecificNeeds(string $specificNeeds): void
    {
        $this->attributes['specific_needs'] = $specificNeeds;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'skin_tone' => 'required|string',
            'skin_undertone' => 'required|string',
            'hair_color' => 'required|string',
            'eye_color' => 'required|string',
            'specific_needs' => 'required|array',
            'specific_needs.*' => 'string',
        ]);
    }
}
