@extends('layouts.admin')
@section('title','三创网后台——修改专家信息')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改专家信息
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
                <a href="{{url('admin/expert/create')}}"><i class="fa fa-plus"></i>添加专家</a>
                <a href="{{url('admin/expert')}}"><i class="fa fa-fw fa-list-ul"></i>专家列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/expert/'.$field->exp_id)}}" method="post">
            {{method_field('put')}}
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">所属领域：</th>
                        <td>
                            <select name="exp_domain" id="selectid">
                                <script type="text/javascript">
                                var array=['其他','产业技术','互联网','创业指导','科学政策'];
                                var htmlstr='';
                                for(var i=0;i<array.length;i++){
                                    if(array[i]=='{{$field->exp_domain}}'){
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
                        <th><i class="require">*</i>专家姓名：</th>
                        <td>
                            <input type="text" class="lg" name="exp_name" value="{{$field->exp_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>头像：</th>
                        <td>
                            <input type="text" class="lg" name="exp_thumb" value="{{$field->exp_thumb}}">
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
                                            $('input[name=exp_thumb]').val(data);
                                            $('#exp_thumb_img').attr('src','/'+data);
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
                            @if($field->exp_thumb)
                            <img src="../../../{{$field->exp_thumb}}" id="exp_thumb_img" style="max-width:350px;max-height:100px;">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>专家介绍：</th>
                        <td>
                            <textarea name="exp_content" style="resize:none;">{{$field->exp_content}}</textarea>
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