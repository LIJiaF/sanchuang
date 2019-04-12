<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Hatch;

class HatchController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Hatch::where('hat_author',session('users')->username)->orderBy('hat_time','desc')->paginate(5);
		return view('admin.hatch.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.hatch.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['hat_time']=time();
		$input['hat_author']=session('users')->username;
		$rules=[
			'hat_name'=>'required',
			'hat_thumb'=>'required',
			'hat_content'=>'required',
		];

		//错误提示
		$message=[
			'hat_name.required'=>'需求名称不能为空',
			'hat_thumb.required'=>'缩略图不能为空',
			'hat_content.required'=>'需求描述不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Hatch::create($input);

		 	if($re){
		 		return redirect('admin/hatch');
		 	}else{
		 		return back()->with('errors','需求发布失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Hatch::find($id);
		return view('admin.hatch.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Hatch::where('hat_id',$id)->update($input);
		if($re){
			return redirect('admin/hatch');
		}else{
			return back()->with('errors','需求更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$file=Hatch::find($id)->hat_thumb;
		$re=Hatch::where('hat_id',$id)->delete();
    	if($re){
    		unlink(base_path().'/'.$file);
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
