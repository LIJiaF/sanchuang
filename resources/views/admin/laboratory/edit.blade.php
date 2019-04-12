@extends('layouts.admin')
@section('title','三创网后台——修改实验室信息')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改实验室信息
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
                <a href="{{url('admin/laboratory/create')}}"><i class="fa fa-plus"></i>新增实验室</a>
                <a href="{{url('admin/laboratory')}}"><i class="fa fa-fw fa-list-ul"></i>实验室列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/laboratory/'.$field->lab_id)}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>实验室名称：</th>
                        <td>
                            <input type="text" class="lg" name="lab_name" value="{{$field->lab_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>视频缩略图：</th>
                        <td>
                            <input type="text" class="lg" name="lab_thumb" value="{{$field->lab_thumb}}">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                            <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadify({
                                        'buttonText' : '图片上传',
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
                                        'uploader' : "{{url('admin/upload')}}",
                                        'onUploadSuccess':function(file,data,response){
                                            $('input[name=lab_thumb]').val(data);
                                            $('#lab_thumb_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadify{display:inline-block;}
                                .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img src="../../../{{$field->lab_thumb}}" id="lab_thumb_img" style="max-width:350px;max-height:100px;">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>视频地址：</th>
                        <td>
                            <input type="text" class="lg" name="lab_src" value="{{$field->lab_src}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>开放时间：</th>
                        <td>
                            <input type="text" class="lg" name="lab_opentime" value="{{$field->lab_opentime}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>项目描述：</th>
                        <td>
                            <textarea name="lab_content" style="resize:none;">{{$field->lab_content}}</textarea>
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