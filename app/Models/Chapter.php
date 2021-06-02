<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Chapter extends Model implements Auditable
{
    use SoftDeletes;

    protected $table = 'chapters';
    protected $fillable = ["code","name"];

    use \OwenIt\Auditing\Auditable;

    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function procedures (){
        return $this->hasMany(Procedure::class);
    }
}
