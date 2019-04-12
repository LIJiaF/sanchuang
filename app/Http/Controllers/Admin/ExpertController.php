<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Expert;

class ExpertController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Expert::orderBy('exp_time','desc')->paginate(5);
		return view('admin.expert.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.expert.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['exp_time']=time();
		$rules=[
			'exp_name'=>'required',
			'exp_thumb'=>'required',
			'exp_content'=>'required',
		];

		//错误提示
		$message=[
			'exp_name.required'=>'专家姓名不能为空',
			'exp_thumb.required'=>'头像不能为空',
			'exp_content.required'=>'专家介绍不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Expert::create($input);

		 	if($re){
		 		return redirect('admin/expert');
		 	}else{
		 		return back()->with('errors','专家添加失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Expert::find($id);
		return view('admin.expert.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Expert::where('exp_id',$id)->update($input);
		if($re){
			return redirect('admin/expert');
		}else{
			return back()->with('errors','专家信息更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$file=Expert::find($id)->exp_thumb;
		$re=Expert::where('exp_id',$id)->delete();
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
