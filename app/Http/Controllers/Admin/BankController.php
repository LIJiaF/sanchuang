<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Bank;

class BankController extends Controller
{
    //全部文章列表
	public function index(){

		$data=Bank::where('ban_author',session('users')->username)->orderBy('ban_time','desc')->paginate(5);
		return view('admin.bank.index',compact('data'));

	}

	//添加文章 get
	public function create(){

		return view('admin.bank.add');

	}

	//添加文章提交过来的数据 post
	public function store(){

		$input=Input::except('_token');
		$input['ban_time']=time();
		$input['ban_author']=session('users')->username;
		$rules=[
			'ban_name'=>'required',
			'ban_content'=>'required',
		];

		//错误提示
		$message=[
			'ban_name.required'=>'项目名称不能为空',
			'ban_content.required'=>'项目描述不能为空',
		];

		 $validator=Validator::make($input,$rules,$message);

		 if($validator->passes()){
		 	
			$re=Bank::create($input);

		 	if($re){
		 		return redirect('admin/bank');
		 	}else{
		 		return back()->with('errors','项目发布失败，请稍后重试');
		 	}


		 }else{
		 	return back()->withErrors($validator);
		 }

	}

	//编辑文章 get admin/article/{id}/edit
	public function edit($id){

		$field=Bank::find($id);
		return view('admin.bank.edit',compact('field'));

	}

	//更新文章信息  put admin/article/{id}
	public function update($id){

		$input=Input::except('_token','_method');
		$re=Bank::where('ban_id',$id)->update($input);
		if($re){
			return redirect('admin/bank');
		}else{
			return back()->with('errors','项目信息更新失败，请稍后重试');
		}

	}

	//删除文章信息 delete admin/article/{id}
	public function destroy($id){

		$re=Bank::where('ban_id',$id)->delete();
    	if($re){
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
