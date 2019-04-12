<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table='link';
    protected $primaryKey='lin_id';
    public $timestamps=false;
    protected $guarded=[];
}
