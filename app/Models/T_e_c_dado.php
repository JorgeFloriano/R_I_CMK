<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class T_e_c_dado extends Model
{
    protected $table = "t_e_c_dados";
    protected $primaryKey = 'id';
    use SoftDeletes;
}
