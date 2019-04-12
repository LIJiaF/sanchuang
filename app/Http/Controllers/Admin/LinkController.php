<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Link;

class LinkController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Link::orderBy('lin_time','desc')->paginate(5);
		return view('admin.link.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.link.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['lin_time']=time();
		$rules=[
			'lin_name'=>'required',
			'lin_href'=>'required',
		];

		//错误提示
		$message=[
			'lin_name.required'=>'链接名称不能为空',
			'lin_href.required'=>'链接地址不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Link::create($input);

		 	if($re){
		 		return redirect('admin/link');
		 	}else{
		 		return back()->with('errors','链接添加失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Link::find($id);
		return view('admin.link.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Link::where('lin_id',$id)->update($input);
		if($re){
			return redirect('admin/link');
		}else{
			return back()->with('errors','链接更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$re=link::where('lin_id',$id)->delete();
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
