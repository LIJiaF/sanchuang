<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='video';
    protected $primaryKey='vid_id';
    public $timestamps=false;
    protected $guarded=[];
}
