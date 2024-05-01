<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

 class Relatorio extends Model
{
    protected $table = "relatorios";
    protected $primaryKey = 'id';
    use SoftDeletes;
    
    public function equipamento() {
        return $this->belongsTo('App\Models\Equipamento');
    }

    public function talEleCorr() {
        return $this->hasOne('App\Models\T_e_c_relatorio');
    }

    public function justifs() {
        return $this->hasMany('App\Models\Justificativa');
    }
}
