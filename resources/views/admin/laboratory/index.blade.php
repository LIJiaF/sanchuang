@extends('layouts.admin')
@section('title','三创网后台——实验室列表')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 实验室列表
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
    
        <div class="result_wrap">
            <div class="result_title">
                <h3>实验室列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/laboratory/create')}}"><i class="fa fa-plus"></i>新增实验室</a>
                    <a href="{{url('admin/laboratory')}}"><i class="fa fa-fw fa-list-ul"></i>实验室列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">实验室名称</th>
                        <th class="tc">视频地址</th>
                        <th class="tc">开放时间</th>
                        <th class="tc">创建时间</th>
                        <th class="tc">操作</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->lab_name}}</td>
                        <td>
                            <a href="#" style="display:block;width:100%;text-align:center;">{{$v->lab_src}}</a>
                        </td>
                        <td class="tc">{{$v->lab_opentime}}</td>
                        <td class="tc">{{date('Y-m-d',$v->lab_time)}}</td>
                        <td class="tc">
                            <a href="{{url('admin/laboratory/'.$v->lab_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="dellab({{$v->lab_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                                        
                </table>

                <style type="text/css">
                    .page_list{
                        text-align: center;
                    }
                    .result_content ul li span {
                        font-size: 15px;
                        padding: 6px 12px;
                    }
                </style>
                
                <div class="page_list">
                    {{$data->links()}}
                </div>

            </div>
        </div>

    </form>
    <!--搜索结果页面 列表 结束-->

    <script type="text/javascript">

    //删除分类
    function dellab(id){

        //提示框
        layer.confirm('您确定要删除这篇文章吗？', {
          btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/laboratory')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                if(!data.status){
                    setTimeout(function(){
                        location.href=location.href;
                    },1000); 
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }, function(){

        });        

    }

    </script>

@endsection