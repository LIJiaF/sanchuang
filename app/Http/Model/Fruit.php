<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $table='fruit';
    protected $primaryKey='fru_id';
    public $timestamps=false;
    protected $guarded=[];
}
