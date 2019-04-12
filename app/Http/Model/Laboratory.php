<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $table='Laboratory';
    protected $primaryKey='lab_id';
    public $timestamps=false;
    protected $guarded=[];
}
