<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Laboratory;

class LaboratoryController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Laboratory::orderBy('lab_time','desc')->paginate(5);
		return view('admin.laboratory.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.laboratory.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['lab_time']=time();
		$rules=[
			'lab_name'=>'required',
			'lab_thumb'=>'required',
			'lab_src'=>'required',
			'lab_opentime'=>'required',
			'lab_content'=>'required',
		];

		//错误提示
		$message=[
			'lab_name.required'=>'实验室名称不能为空',
			'lab_thumb.required'=>'视频缩略图不能为空',
			'lab_src.required'=>'视频地址不能为空',
			'lab_opentime.required'=>'开放时间不能为空',
			'lab_content.required'=>'项目描述不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Laboratory::create($input);

		 	if($re){
		 		return redirect('admin/laboratory');
		 	}else{
		 		return back()->with('errors','新增实验室失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Laboratory::find($id);
		return view('admin.laboratory.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Laboratory::where('lab_id',$id)->update($input);
		if($re){
			return redirect('admin/laboratory');
		}else{
			return back()->with('errors','实验室信息更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$file=Laboratory::find($id)->lab_thumb;
		$re=Laboratory::where('lab_id',$id)->delete();
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
