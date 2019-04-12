<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Fruit;
use App\Http\Model\Need;
use App\Http\Model\Hatch;
use App\Http\Model\Bank;
use App\Http\Model\Assess;

class AdministratorController extends Controller
{

    public function fruadmin(){

		$data=Fruit::orderBy('fru_state','asc')->orderBy('fru_time','desc')->paginate(5);
		return view('admin.fruadmin',compact('data'));

	}

	public function fruchangestate($id){

		$field=Fruit::find($id);
		$field->fru_state = '2';
		$field->save();
		return redirect('admin/fruadmin');

	}

	public function neeadmin(){

		$data=Need::orderBy('nee_state','asc')->orderBy('nee_time','desc')->paginate(5);
		return view('admin.neeadmin',compact('data'));

	}

	public function neechangestate($id){

		$field=Need::find($id);
		$field->nee_state = '2';
		$field->save();
		return redirect('admin/neeadmin');

	}

	public function hatadmin(){

		$data=Hatch::orderBy('hat_state','asc')->orderBy('hat_time','desc')->paginate(5);
		return view('admin.hatadmin',compact('data'));

	}

	public function hatchangestate($id){

		$field=Hatch::find($id);
		$field->hat_state = '2';
		$field->save();
		return redirect('admin/hatadmin');

	}

	public function banadmin(){

		$data=Bank::orderBy('ban_state','asc')->orderBy('ban_time','desc')->paginate(5);
		return view('admin.banadmin',compact('data'));

	}

	public function banchangestate($id){

		$field=Bank::find($id);
		$field->ban_state = '2';
		$field->save();
		return redirect('admin/banadmin');

	}

	public function assadmin(){

		$data=Assess::orderBy('ass_state','asc')->orderBy('ass_time','desc')->paginate(5);
		return view('admin.assadmin',compact('data'));

	}

	public function asschangestate($id){

		$field=Assess::find($id);
		$field->ass_state = '2';
		$field->save();
		return redirect('admin/assadmin');

	}

}
