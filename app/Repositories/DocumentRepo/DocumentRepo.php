<?php

namespace App\Repositories\DocumentRepo;

use App\Models\Document;
use App\Repositories\BaseRepo;

class DocumentRepo extends BaseRepo
{
    public function getModel() {
        return new Document();
    }
}