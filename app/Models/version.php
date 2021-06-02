<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class version extends Model implements Auditable
{
    protected $table = 'versions';
    protected $fillable = ["revision","date","description", "document_id", "user_id"];

    use \OwenIt\Auditing\Auditable;

    public function getCreatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getDateAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function getUpdatedAtAttribute($value) {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
