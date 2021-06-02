<?php

namespace App\Repositories\versionRepo;

use App\Models\version;
use App\Repositories\BaseRepo;

class versionRepo extends BaseRepo
{
    public function getModel() {
        return new version();
    }
}