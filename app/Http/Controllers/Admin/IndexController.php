<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;

class IndexController extends Controller
{
    
	public function index(){

		return view('admin.index');

	}

	public function info(){

		return view('admin.info');

	}

	// 更改管理员密码
	public function pass(){

		if($input=Input::all()){

			//规则
			$rules=[
				'password'=>'required | between:6,20 | confirmed', //密码不能为空,长度在6到20位之间，新密码和确认密码一致
			];

			//错误提示
			$message=[
				'password.required'=>'新密码不能为空',
				'password.between'=>'长度必须在6到20位之间',
				'password.confirmed'=>'新密码和确认密码不一致',
			];

			 $validator=Validator::make($input,$rules,$message);

			 if($validator->passes()){

			 	$users=User::where('username',session('users')->username)->first();
			 	$_password=Crypt::decrypt($users->password);
			 	if($input['password_o']==$_password){
			 		$users->password=Crypt::encrypt($input['password']);
			 		$users->update();
			 		return back()->with('errors','密码修改成功！');
			 	}else{
			 		return back()->with('errors','原密码错误！');
			 	}

			 }else{
			 	return back()->withErrors($validator);
			 }

		}else{

			return view('admin.pass');

		}

	}

	//图片上传
	public function upload(){

		$file=Input::file('Filedata');
		// dd($file->getSize()); 获取文件大小
		if($file->isValid()){

			$realPath=$file->getRealPath(); //零时文件的绝对路径
			$entension=$file->getClientOriginalExtension(); //上传文件的后缀
			$newName=date('YmdHis').mt_rand(100,999).'.'.$entension;
			$path=$file->move(base_path().'/uploads',$newName);
			$filepath='uploads/'.$newName;
			return $filepath;

		}

	}


}
