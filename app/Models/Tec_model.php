<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tec_model extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "tec_models";
    protected $primaryKey = 'id';
}
