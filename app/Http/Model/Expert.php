<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $table='expert';
    protected $primaryKey='exp_id';
    public $timestamps=false;
    protected $guarded=[];
}
