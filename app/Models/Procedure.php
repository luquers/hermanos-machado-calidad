<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Procedure extends Model implements Auditable
{

    protected $table = 'procedures';
    protected $fillable = ["code","name","description", "chapter_id"];

    use \OwenIt\Auditing\Auditable;

    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }

    public function documents (){
        return $this->hasMany(Document::class);
    }
}
