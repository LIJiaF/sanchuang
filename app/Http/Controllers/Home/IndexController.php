<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

class IndexController extends Controller
{
    public function index(){

        $frudata=Fruit::where('fru_state','2')->orderBy('fru_time','desc')->take(8)->get();
        $needata=Need::where('nee_state','2')->orderBy('nee_time','desc')->take(5)->get();
        $assdata=Assess::where('ass_state','2')->orderBy('ass_time','desc')->take(5)->get();
        $hatdata=Hatch::where('hat_state','2')->orderBy('hat_time','desc')->take(5)->get();
        $bandata=Bank::where('ban_state','2')->orderBy('ban_time','desc')->take(5)->get();

        $frudata2=Fruit::where('fru_state','2')->orderBy('fru_time','desc')->take(5)->get();

        return view('home.main',compact('frudata','frudata2','needata','assdata','hatdata','bandata'));

    }


    public function fruit(){

        $frudata=Fruit::where('fru_state','2')->orderBy('fru_time','desc')->paginate(15);
        $fruview=Fruit::where('fru_state','2')->orderBy('fru_time','desc')->take(5)->get();
        $frutime=Fruit::where('fru_state','2')->orderBy('fru_time','desc')->take(5)->get();
        return view('home.fruit',compact('frudata','fruview','frutime'));

    }

    public function need(){

        $needata=Need::where('nee_state','2')->orderBy('nee_time','desc')->paginate(15);
        $neeview=Need::where('nee_state','2')->orderBy('nee_time','desc')->take(5)->get();
        $neetime=Need::where('nee_state','2')->orderBy('nee_time','desc')->take(5)->get();
        return view('home.need',compact('needata','neeview','neetime'));

    }

    public function assess(){

        $assview=Assess::where('ass_state','2')->orderBy('ass_time','desc')->take(5)->get();
        $asstime=Assess::where('ass_state','2')->orderBy('ass_time','desc')->take(5)->get();
        return view('home.assess',compact('assview','asstime'));

    }

    public function hatch(){

        $hatdata=Hatch::where('hat_state','2')->orderBy('hat_time','desc')->paginate(15);
        $hatview=Hatch::where('hat_state','2')->orderBy('hat_time','desc')->take(5)->get();
        $hattime=Hatch::where('hat_state','2')->orderBy('hat_time','desc')->take(5)->get();
        return view('home.hatch',compact('hatdata','hatview','hattime'));

    }

    public function bank(){

        $bandata=Bank::where('ban_state','2')->orderBy('ban_time','desc')->paginate(15);
        $banview=Bank::where('ban_state','2')->orderBy('ban_time','desc')->take(5)->get();
        $bantime=Bank::where('ban_state','2')->orderBy('ban_time','desc')->take(5)->get();
        return view('home.bank',compact('bandata','banview','bantime'));

    }

    public function link(){

        $lindata1=Link::where('lin_class','政策导航')->orderBy('lin_time','desc')->get();
        $lindata2=Link::where('lin_class','资讯导航')->orderBy('lin_time','desc')->get();
        $lindata3=Link::where('lin_class','专利导航')->orderBy('lin_time','desc')->get();
        $lindata4=Link::where('lin_class','活动导航')->orderBy('lin_time','desc')->get();
        return view('home.link',compact('lindata1','lindata2','lindata3','lindata4'));

    }

    public function laboratory(){

        $labdata=Laboratory::orderBy('lab_time','desc')->get();
        return view('home.laboratory',compact('labdata'));

    }

    public function expert(){

        $expdata1=Expert::where('exp_domain','产业技术')->orderBy('exp_time','desc')->get();
        $expdata2=Expert::where('exp_domain','互联网')->orderBy('exp_time','desc')->get();
        $expdata3=Expert::where('exp_domain','创业指导')->orderBy('exp_time','desc')->get();
        $expdata4=Expert::where('exp_domain','科技政策')->orderBy('exp_time','desc')->get();
        return view('home.expert',compact('expdata1','expdata2','expdata3','expdata4'));

    }

    public function videos(){

        $viddata=Video::orderBy('vid_time','desc')->get();
        return view('home.video',compact('viddata'));

    }

    public function quit(){

        session(['users'=>null]);
        return redirect('/');
        
    }

    public function search(){

        $input=Input::all();

        if($input['search']){

            $search=$input['search'];

            $fruit = DB::select("select * from Fruit where fru_author like '%{$search}%' or fru_name like '%{$search}%' order by fru_time desc");

            $need = DB::select("select * from Need where nee_author like '%{$search}%' or nee_name like '%{$search}%' order by nee_time desc");

            $assess = DB::select("select * from Assess where ass_author like '%{$search}%' or ass_name like '%{$search}%' order by ass_time desc");

            $hatch = DB::select("select * from Hatch where hat_author like '%{$search}%' or hat_name like '%{$search}%' order by hat_time desc");

            $bank = DB::select("select * from Bank where ban_author like '%{$search}%' or ban_name like '%{$search}%' order by ban_time desc");

            $data=array_merge($fruit,$need,$assess,$hatch,$bank);
            
            return view('search',compact('data','search'));

        }else{
            return redirect('/');
        }        

    }
}
