<?php

namespace App\Repositories\ChapterRepo;

use App\Models\Chapter;
use App\Repositories\BaseRepo;

class ChapterRepo extends BaseRepo
{
    public function getModel() {
        return new Chapter();
    }
}