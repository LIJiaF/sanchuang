<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Assess;

class AssessController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Assess::where('ass_author',session('users')->username)->orderBy('ass_time','desc')->paginate(5);
		return view('admin.assess.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.assess.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['ass_time']=time();
		$input['ass_author']=session('users')->username;
		$rules=[
			'ass_name'=>'required',
			'ass_obj'=>'required',
			'ass_rate'=>'required',
			'ass_content'=>'required',
		];

		//错误提示
		$message=[
			'ass_name.required'=>'技术名称不能为空',
			'ass_obj.required'=>'评估目的不能为空',
			'ass_rate.required'=>'评估价格不能为空',
			'ass_content.required'=>'技术描述不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Assess::create($input);

		 	if($re){
		 		return redirect('admin/assess');
		 	}else{
		 		return back()->with('errors','在线评估失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Fruit::find($id);
		return view('admin.fruit.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Fruit::where('fru_id',$id)->update($input);
		if($re){
			return redirect('admin/fruit');
		}else{
			return back()->with('errors','成果更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$file=Fruit::find($id)->fru_thumb;
		$re=Fruit::where('fru_id',$id)->delete();
    	if($re){
    		unlink(base_path().'/'.$file);
    		$data=[
    			'status'=>0,
    			'msg'=>'成果删除成功！'
    		];
    	}else{
    		$data=[
    			'status'=>1,
    			'msg'=>'成果删除失败，请稍后重试！'
    		];
    	}
    	return $data;

	}
}
