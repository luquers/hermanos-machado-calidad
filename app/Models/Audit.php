<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'audits';
    protected $fillable = [""];



    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->addhours(2)->format('d/m/Y h:m:s') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }


}
