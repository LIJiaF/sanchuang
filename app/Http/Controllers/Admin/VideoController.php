<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Video;

class VideoController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Video::orderBy('vid_time','desc')->paginate(5);
		return view('admin.video.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.video.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['vid_time']=time();
		$rules=[
			'vid_name'=>'required',
			'vid_thumb'=>'required',
			'vid_src'=>'required',
		];

		//错误提示
		$message=[
			'vid_name.required'=>'视频名称不能为空',
			'vid_thumb.required'=>'缩略图不能为空',
			'vid_content.required'=>'视频地址不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Video::create($input);

		 	if($re){
		 		return redirect('admin/video');
		 	}else{
		 		return back()->with('errors','视频上传失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Video::find($id);
		return view('admin.video.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Video::where('vid_id',$id)->update($input);
		if($re){
			return redirect('admin/video');
		}else{
			return back()->with('errors','视频信息更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$file=Video::find($id)->vid_thumb;
		$re=Video::where('vid_id',$id)->delete();
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
