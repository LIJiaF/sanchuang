@extends('layouts.admin')
@section('title','三创网后台——修改项目信息')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改项目信息
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/fruit/create')}}"><i class="fa fa-plus"></i>发布项目</a>
                <a href="{{url('admin/fruit')}}"><i class="fa fa-fw fa-list-ul"></i>项目列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/bank/'.$field->ban_id)}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">融资领域：</th>
                        <td>
                            <select name="ban_domain" id="selectid">
                                <script type="text/javascript">
                                var array=['不限','生产','生活','电子科技','教育休闲'];
                                var htmlstr='';
                                for(var i=0;i<array.length;i++){
                                    if(array[i]=='{{$field->ban_domain}}'){
                                        htmlstr+='<option value="'+array[i]+'" selected>'+array[i]+'</option>';
                                    }else{
                                        htmlstr+='<option value="'+array[i]+'">'+array[i]+'</option>';
                                    }
                                }
                                $('#selectid').html(htmlstr);
                                </script>
                            </select>
                        </td>
                    </tr>                    
                    <tr>
                        <th width="120">融资方式：</th>
                        <td>
                            <select name="ban_method" id="selectidt">
                                <script type="text/javascript">
                                var array=['其他','短期融资','银行贷款','委托贷款','金融租赁','个人贷款','IPO上市','股权转让','产权转让','投资加盟'];
                                var htmlstr='';
                                for(var i=0;i<array.length;i++){
                                    if(array[i]=='{{$field->ban_method}}'){
                                        htmlstr+='<option value="'+array[i]+'" selected>'+array[i]+'</option>';
                                    }else{
                                        htmlstr+='<option value="'+array[i]+'">'+array[i]+'</option>';
                                    }
                                }
                                $('#selectidt').html(htmlstr);
                                </script>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>项目名称：</th>
                        <td>
                            <input type="text" class="lg" name="ban_name" value="{{$field->ban_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>融资额度：</th>
                        <td>
                            <input type="text" class="lg" name="ban_rate" style="width:200px;" value="{{$field->ban_rate}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>项目描述：</th>
                        <td>
                            <textarea name="ban_content" style="resize:none;">{{$field->ban_content}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection