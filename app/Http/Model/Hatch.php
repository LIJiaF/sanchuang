<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Hatch extends Model
{
    protected $table='hatch';
    protected $primaryKey='hat_id';
    public $timestamps=false;
    protected $guarded=[];
}
