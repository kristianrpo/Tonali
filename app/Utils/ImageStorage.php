<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class ImageStorage
{
    public static function storeImage($entity, $image, $entityType)
    {
        $imageName = $entity->getId().'.'.$image->extension();
        Storage::disk('public')->put(
            $entityType.'/'.$imageName,
            file_get_contents($image->getRealPath())
        );

        return $imageName;
    }

    public static function deleteImage($entity, $entityType)
    {
        if ($entity->getImage()) {
            Storage::disk('public')->delete($entityType.'/'.$entity->getImage());
        }
    }
}
