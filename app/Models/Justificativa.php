<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Justificativa extends Model
{
    protected $table = "justificativas";
    protected $primaryKey = 'id';
    use SoftDeletes;
    
    public function relatorio() {
        return $this->belongsTo('App\Models\Relatorio');
    }
}


