<?php

namespace App\Repositories\ProcedureRepo;

use App\Models\Procedure;
use App\Repositories\BaseRepo;

class ProcedureRepo extends BaseRepo
{
    public function getModel() {
        return new Procedure();
    }

    public function getProcedureById($procedure_id)
    {
        return $this->getModel()->where('id', $procedure_id);
    }
}