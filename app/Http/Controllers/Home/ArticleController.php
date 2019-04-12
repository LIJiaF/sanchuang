<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Fruit;
use App\Http\Model\Need;
use App\Http\Model\Assess;
use App\Http\Model\Hatch;
use App\Http\Model\Bank;
use App\Http\Model\Link;
use App\Http\Model\Laboratory;
use App\Http\Model\Expert;
use App\Http\Model\Video;

class ArticleController extends Controller
{
    
	public function fruit($id){

        $frudata=Fruit::find($id);
        return view('home.article.fruit',compact('frudata'));

    }

    public function need($id){

        $needata=Need::find($id);
        return view('home.article.need',compact('needata'));

    }

    public function assess($id){

        $assdata=Assess::find($id);
        return view('home.article.assess',compact('assdata'));

    }

    public function hatch($id){

        $hatdata=Hatch::find($id);
        return view('home.article.hatch',compact('hatdata'));

    }

    public function bank($id){

        $bandata=Bank::find($id);
        return view('home.article.bank',compact('bandata'));

    }

    public function expert($id){

        $expdata=Expert::find($id);
        return view('home.article.expert',compact('expdata'));

    }

}
