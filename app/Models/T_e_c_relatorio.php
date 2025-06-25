<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class T_e_c_relatorio extends Model
{
    protected $table = "t_e_c_relatorios";
    protected $primaryKey = 'id';
    use SoftDeletes;

    public function relatorio() {
        return $this->belongsTo('App\Models\Relatorio');
    }
}
