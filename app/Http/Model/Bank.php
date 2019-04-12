<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table='bank';
    protected $primaryKey='ban_id';
    public $timestamps=false;
    protected $guarded=[];
}
