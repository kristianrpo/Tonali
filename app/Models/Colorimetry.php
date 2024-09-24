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
     * $this->attributes['skinTone'] - string - contains the customer skin tone
     * $this->attributes['skinUndertone'] - string - contains the customer skin undertone
     * $this->attributes['hairColor'] - string - contains the customer hair color
     * $this->attributes['eyeColor'] - string - contains the customer eye color
     * $this->attributes['specificNeeds'] - string - contains the customer specific needs, optional
     * $this->attributes['created_at'] - string - contains the date of creation
     * $this->attributes['updated_at'] - string - contains the date of update
     * $this->attributes['user_id'] - int - contains the ID of the user to which the colorimetry belongs
     */
    protected $fillable = [
        'customerName',
        'skinTone',
        'skinUndertone',
        'hairColor',
        'eyeColor',
        'specificNeeds',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getSkinTone(): string
    {
        return $this->attributes['skinTone'];
    }

    public function setSkinTone(string $skinTone): void
    {
        $this->attributes['skinTone'] = $skinTone;
    }

    public function getSkinUndertone(): string
    {
        return $this->attributes['skinUndertone'];
    }

    public function setSkinUndertone(string $skinUndertone): void
    {
        $this->attributes['skinUndertone'] = $skinUndertone;
    }

    public function getHairColor(): string
    {
        return $this->attributes['hairColor'];
    }

    public function setHairColor(string $hairColor): void
    {
        $this->attributes['hairColor'] = $hairColor;
    }

    public function getEyeColor(): string
    {
        return $this->attributes['eyeColor'];
    }

    public function setEyeColor(string $eyeColor): void
    {
        $this->attributes['eyeColor'] = $eyeColor;
    }

    public function getSpecificNeeds(): string
    {
        return $this->attributes['specificNeeds'];
    }

    public function setSpecificNeeds(string $specificNeeds): void
    {
        $this->attributes['specificNeeds'] = $specificNeeds;
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
            'skinTone' => 'required|string',
            'skinUndertone' => 'required|string',
            'hairColor' => 'required|string',
            'eyeColor' => 'required|string',
            'specificNeeds' => 'required|array',
            'specificNeeds.*' => 'string',
        ]);
    }
}
