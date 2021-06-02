<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Document extends Model implements Auditable
{
    protected $table = 'documents';
    protected $fillable = ["code","name","link", "procedure_id"];

    use \OwenIt\Auditing\Auditable;

    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function versions (){
        return $this->hasMany(Version::class);
    }

    public function procedure(){
        return $this->belongsTo(Procedure::class);
    }

}
