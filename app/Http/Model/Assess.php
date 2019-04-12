<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Assess extends Model
{
    protected $table='assess';
    protected $primaryKey='ass_id';
    public $timestamps=false;
    protected $guarded=[];
}
