@extends('layouts.admin')
@section('title','三创网后台——科技成果列表')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 科技成果
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
    
        <div class="result_wrap">
            <div class="result_title">
                <h3>科技成果列表</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/fruit/create')}}"><i class="fa fa-plus"></i>发布成果</a>
                    <a href="{{url('admin/fruit')}}"><i class="fa fa-fw fa-list-ul"></i>成果列表</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">行业分类</th>
                        <th class="tc">成果名称</th>
                        <th class="tc">交易价格</th>
                        <th class="tc">发布时间</th>
                        <th class="tc">状态</th>
                        <th class="tc">操作</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        <td class="tc">{{$v->fru_class}}</td>
                        <td>
                            <a href="#" style="display:block;width:100%;text-align:center;">{{$v->fru_name}}</a>
                        </td>
                        <td class="tc">{{$v->fru_rate}}</td>
                        <td class="tc">{{date('Y-m-d',$v->fru_time)}}</td>
                        <td class="tc">
                            @if(($v->fru_state)=='2')
                                <span style="color:green;">已审核</span>
                            @else
                                <span style="color:red">审核中</span>
                            @endif
                        </td>
                        <td class="tc">
                            <a href="{{url('admin/fruit/'.$v->fru_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="delfru({{$v->fru_id}})">删除</a>
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
            $.post("{{url('admin/fruit')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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