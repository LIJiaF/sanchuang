<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\User;

require_once('resources/org/code/Code.class.php');

class LoginController extends Controller
{

    public function register(){

        if($input=Input::all()){

            $username=$input['username'];
            $data=User::where('username',$username)->first();
            if($data){                
                
                return back()->with('errors','用户名已存在');

            }else{

                $rules=[
                    'username'=>'required | between:6,20',
                    'password'=>'required | between:6,20 | confirmed',
                ];
                $message=[
                    'username.required'=>'用户名不能为空',
                    'username.between'=>'用户名长度必须在6到20位之间',
                    'password.required'=>'密码不能为空',
                    'password.between'=>'密码长度必须在6到20位之间',
                    'password.confirmed'=>'密码和确认密码不一致',
                ];

                $validator=Validator::make($input,$rules,$message);

                if($validator->passes()){

                    array_pop($input);
                    array_shift($input);

                    $input['password']=Crypt::encrypt($input['password']);
                    $re=User::create($input);
                    if($re){
                        return redirect('admin/login');
                    }else{
                        return back()->with('errors','注册失败，请稍后重试！');
                    }

                }else{
                    return back()->withErrors($validator);
                }

            }

        }else{
            return view('admin.register');
        }       

    }

    public function login(){

    	if($input=Input::all()){

    		$code=new \Code;
    		$_code=$code->get();
    		if(strtoupper($input['code'])!=$_code){
    			return back()->with('msg','验证码错误！');  //将错误信心返回提交页面，错误信息存放在session中
    		}

    		$users=User::where('username',$input['username'])->first();

    		if(!$users || $users->username!=$input['username'] || Crypt::decrypt($users->password)!=$input['password']){
    			return back()->with('msg','用户名或密码错误！');  //将错误信心返回提交页面，错误信息存放在session中
    		}

    		session(['users'=>$users]);
            return redirect('/');


    	}else{

    		return view('admin.login');

    	}

    }

    public function code(){

    	$code=new \Code;
    	$code->make();

    }

    public function crypt(){

    	$str="123456";
    	echo Crypt::encrypt($str);

    }

    public function quit(){

        return redirect('/');

    }

}
