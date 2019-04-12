@extends('layouts.admin')
@section('title','三创网后台——修改科技需求')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改科技需求
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
                <a href="{{url('admin/need/create')}}"><i class="fa fa-plus"></i>发布成果</a>
                <a href="{{url('admin/need')}}"><i class="fa fa-fw fa-list-ul"></i>成果列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/need/'.$field->nee_id)}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">技术领域：</th>
                        <td>
                            <select name="nee_class" id="selectid">
                                <script type="text/javascript">
                                var array=['信息技术','新材料','资源环境','纺织服装','食品营养'];
                                var htmlstr='';
                                for(var i=0;i<array.length;i++){
                                    if(array[i]=='{{$field->nee_class}}'){
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
                        <th><i class="require">*</i>需求名称：</th>
                        <td>
                            <input type="text" class="lg" name="nee_name" value="{{$field->nee_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>投入资金：</th>
                        <td>
                            <input type="text" class="lg" name="nee_rate" style="width:200px;" value="{{$field->nee_rate}}">
                        </td>
                    </tr>                    
                    <tr>
                        <th>合作方式：</th>
                        <td>
                            <input type="text" class="lg" name="nee_method" style="width:200px;" value="{{$field->nee_method}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>需求描述：</th>
                        <td>
                            <textarea name="nee_content" style="resize:none;">{{$field->nee_content}}</textarea>
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