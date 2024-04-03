<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipamento extends Model
{
    protected $table = "equipamentos";
    protected $primaryKey = 'id';
    use SoftDeletes;
    
    public function relatorio() {
        return $this->hasOne('App\Models\Relatorio');
    }

    public function relatorios() {
        return $this->hasMany('App\Models\Relatorio');
    }

    public function talEleCorr() {
        return $this->hasOne('App\Models\T_e_c_dado');
    }
}
