@extends('layouts.admin')
@section('title','三创网后台——发布成果')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 发布成果
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
                <a href="{{url('admin/fruit/create')}}"><i class="fa fa-plus"></i>发布成果</a>
                <a href="{{url('admin/fruit')}}"><i class="fa fa-fw fa-list-ul"></i>成果列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/fruit')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">行业分类：</th>
                        <td>
                            <select name="fru_class">
                                <option value="不限">不限</option>
                                <option value="食品饮料">食品饮料</option>
                                <option value="建筑建材">建筑建材</option>
                                <option value="家居用品">家居用品</option>
                                <option value="轻工纺织">轻工纺织</option>
                                <option value="化学化工">化学化工</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>成果名称：</th>
                        <td>
                            <input type="text" class="lg" name="fru_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>缩略图：</th>
                        <td>
                            <input type="text" class="lg" name="fru_thumb">
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
                                            $('input[name=fru_thumb]').val(data);
                                            $('#fru_thumb_img').attr('src','/'+data);
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
                            <img src="" id="fru_thumb_img" style="max-width:350px;max-height:100px;">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>交易价格：</th>
                        <td>
                            <input type="text" class="lg" name="fru_rate" style="width:200px;">
                        </td>
                    </tr>
                    <tr>
                        <th>专利号：</th>
                        <td>
                            <input type="text" class="lg" name="fru_num">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>成果描述：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/edit/kindeditor/kindeditor.js')}}"></script>
                            <script type="text/javascript">
                                KindEditor.ready(function(K) {
                                        window.editor = K.create('#editor_id');
                                });
                            </script>
                            <textarea name="fru_content" id="editor_id" style="width:930px;height:300px;"></textarea>
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