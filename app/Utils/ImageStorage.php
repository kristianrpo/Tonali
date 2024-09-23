<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ImageStorage
{
    public static function storeImage(Model $entity, UploadedFile $image, string $entityType): string
    {
        $imageName = $entity->getId().'.'.$image->extension();
        Storage::disk('public')->put(
            $entityType.'/'.$imageName,
            file_get_contents($image->getRealPath())
        );

        return $imageName;
    }

    public static function deleteImage(Model $entity, string $entityType): void
    {
        if ($entity->getImage()) {
            Storage::disk('public')->delete($entityType.'/'.$entity->getImage());
        }
    }
}
