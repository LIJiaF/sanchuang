@extends('layouts.admin')
@section('title','三创网后台——管理员界面')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 管理员界面
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
    
        <div class="result_wrap">
            <div class="result_title">
                <h3>项目列表</h3>
            </div>
            <!--快捷导航 开始-->
            <style type="text/css">
			.Acolor{
				display: inline-block;
				padding:5px 10px;
				color:gray;
				text-decoration: none;
				cursor:default;
				border:1px solid #ccc;
			}
			.Acolor:hover{
				color:gray;
				text-decoration: none;
			}
            </style>
            <div class="result_content">
                <div class="short_wrap" id="Acolor">
                    <a href="{{url('admin/fruadmin')}}">科技成果</a>
                    <a href="{{url('admin/neeadmin')}}">科技需求</a>
                    <a href="{{url('admin/hatadmin')}}">科技孵化</a>
                    <a href="{{url('admin/banadmin')}}">科技金融</a>
                    <a href="{{url('admin/assadmin')}}" class="Acolor">科技评估</a>
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
                        <th class="tc">发布人</th>
                        <th class="tc">发布时间</th>
                        <th class="tc">状态</th>
                        <th class="tc" style="min-width:5%;">操作</th>
                    </tr>

                    @foreach($data as $v)
                    <tr>
                        <td>
                            <a href="#" style="display:block;width:100%;text-align:center;">{{$v->ass_name}}</a>
                        </td>
                        <td class="tc">{{$v->ass_area}}</td>
                        <td class="tc">{{$v->ass_class}}</td>
                        <td class="tc">{{$v->ass_obj}}</td>
                        <td class="tc">{{$v->ass_rate}}</td>
                        <td class="tc">{{$v->ass_author}}</td>
                        <td class="tc">{{date('Y-m-d',$v->ass_time)}}</td>
                        <td class="tc">
                            @if(($v->ass_state)=='2')
                                <span style="color:green;">合格</span>
                            @else
                                <span style="color:red">审核中</span>
                            @endif
                        </td>
                        <td class="tc">
                        	@if(($v->ass_state)=='1')
                                <a href="{{url('admin/asschangestate/'.$v->ass_id)}}" style="display:block;width:100%;text-align:center;">通过</a>
                            @else
                            	<a href="#" style="display:block;width:100%;text-align:center;color:gray;cursor:default;">已通过</a>
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