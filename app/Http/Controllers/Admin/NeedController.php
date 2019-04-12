<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Need;

class NeedController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Need::where('nee_author',session('users')->username)->orderBy('nee_time','desc')->paginate(5);
		return view('admin.need.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.need.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['nee_time']=time();
		$input['nee_author']=session('users')->username;

		$rules=[
			'nee_name'=>'required',
			'nee_rate'=>'required',
			'nee_content'=>'required',
		];

		//错误提示
		$message=[
			'nee_name.required'=>'需求名称不能为空',
			'nee_rate.required'=>'投入金额不能为空',
			'nee_content.required'=>'需求描述不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Need::create($input);

		 	if($re){
		 		return redirect('admin/need');
		 	}else{
		 		return back()->with('errors','需求发布失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Need::find($id);
		return view('admin.need.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Need::where('nee_id',$id)->update($input);
		if($re){
			return redirect('admin/need');
		}else{
			return back()->with('errors','需求更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$re=Need::where('nee_id',$id)->delete();
    	if($re){
    		$data=[
    			'status'=>0,
    			'msg'=>'需求删除成功！'
    		];
    	}else{
    		$data=[
    			'status'=>1,
    			'msg'=>'需求删除失败，请稍后重试！'
    		];
    	}
    	return $data;

	}
}
