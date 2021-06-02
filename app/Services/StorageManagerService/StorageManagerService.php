<?php


namespace App\Services\StorageManagerService;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Codegaf\StorageManager\StorageManagerServiceBase;


class StorageManagerService extends StorageManagerServiceBase {

    public function checkPermissions(Media $media) {
        switch ($media->collection_name) {
            case 'avatar':
                if (!$this->userHasRole($media)) {
                    return false;
                }
                if (!$this->userIsOwner($media)) {
                    return false;
                }
                return true;
            default:
                return true;
        }
    }
}