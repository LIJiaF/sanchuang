@extends('layouts.admin')
@section('title','三创网后台——发布项目')
@section('content')
<script type="text/javascript" src="{{asset('resources/org/edit/script/jquery-1.6.4.js')}}"></script>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 发布项目
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
                <a href="{{url('admin/bank/create')}}"><i class="fa fa-plus"></i>发布项目</a>
                <a href="{{url('admin/bank')}}"><i class="fa fa-fw fa-list-ul"></i>项目列表</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/bank')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">融资领域：</th>
                        <td>
                            <select name="ban_domain">
                                <option value="不限">不限</option>
                                <option value="生产">生产</option>
                                <option value="生活">生活</option>
                                <option value="电子科技">电子科技</option>
                                <option value="教育休闲">教育休闲</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="120">融资方式：</th>
                        <td>
                            <select name="ban_method">
                                <option value="其他">其他</option>
                                <option value="短期融资">短期融资</option>
                                <option value="银行贷款">银行贷款</option>
                                <option value="委托贷款">委托贷款</option>
                                <option value="金融租赁">金融租赁</option>
                                <option value="个人贷款">个人贷款</option>
                                <option value="IPO上市">IPO上市</option>
                                <option value="股权转让">股权转让</option>
                                <option value="产权转让">产权转让</option>
                                <option value="投资加盟">投资加盟</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>项目名称：</th>
                        <td>
                            <input type="text" class="lg" name="ban_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>融资额度：</th>
                        <td>
                            <input type="text" class="lg" name="ban_rate" style="width:200px;" value="面谈">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>项目描述：</th>
                        <td>
                            <textarea name="ban_content" style="resize:none;"></textarea>
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