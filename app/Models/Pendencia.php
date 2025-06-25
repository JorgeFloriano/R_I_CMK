<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendencia extends Model
{
    protected $table = "pendencias";
    protected $primaryKey = 'id';
    use SoftDeletes;
    
    public function relatorios() {
        return $this->belongsToMany('App\Models\Relatorio');
    }
}


