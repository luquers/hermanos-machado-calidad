<?php

namespace App\Repositories\AuditRepo;

use App\Models\Audit;
use App\Repositories\BaseRepo;

class AuditRepo extends BaseRepo
{
    public function getModel() {
        return new Audit();
    }
}