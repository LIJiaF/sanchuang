<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $table='need';
    protected $primaryKey='nee_id';
    public $timestamps=false;
    protected $guarded=[];
}
