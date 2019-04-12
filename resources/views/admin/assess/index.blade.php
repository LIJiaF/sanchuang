@extends('layouts.admin')
@section('title','三创网后台——评估报告')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 评估报告
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
    
        <div class="result_wrap">
            <div class="result_title">
                <h3>快捷操作</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/assess/create')}}"><i class="fa fa-plus"></i>在线评估</a>
                    <a href="{{url('admin/assess')}}"><i class="fa fa-fw fa-list-ul"></i>评估报告</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">技术名称</th>
                        <th class="tc">转让区域</th>
                        <th class="tc">行业类别</th>
                        <th class="tc">评估目的</th>
                        <th class="tc">评估价格</th>
                        <th class="tc">状态</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <a href="#" style="display:block;width:100%;text-align:center;">{{$v->ass_name}}</a>
                        </td>
                        <td class="tc">{{$v->ass_area}}</td>
                        <td class="tc">{{$v->ass_class}}</td>
                        <td class="tc">{{$v->ass_obj}}</td>
                        <td class="tc">{{$v->ass_rate}}</td>
                        <td class="tc">
                            @if(($v->ass_state)=='2')
                                <span style="color:green;">合格</span>
                            @else
                                <span style="color:red">评测中</span>
                            @endif
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
    function delfru(id){

        //提示框
        layer.confirm('您确定要删除这篇文章吗？', {
          btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/assess')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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