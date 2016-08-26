@extends('layout.admin')
@section('content')
        <!--面包屑导航 开始-->

<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
</div>
<!--面包屑导航 结束-->

<!--结果页快捷搜索框 开始-->

<!--结果页快捷搜索框 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">


    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th>ID</th>
                    <th>Img</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr id="row_{{$v->id}}">
                    <td>{{$v->id}}</td>
                    <td><img wdith='100' height='50' src="{{url($v->bigimg)}}" alt=""></td>
                    <td>
                        <a href="#" onclick="deletecate({{$v->id}})">删除</a>
                    </td>
                </tr>
             @endforeach

            </table>


            <div class="page_list">

            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span {
        padding: 6px 12px;
        font-size: 15px;
    }
</style>
<script>
    $('.minicolors').minicolors();
    $.minicolors = {
        defaults: {
            animationSpeed: 50,
            animationEasing: 'swing',
            change: null,
            changeDelay: 0,
            control: 'hue',
            defaultValue: '',
            hide: null,
            hideSpeed: 100,
            inline: false,
            letterCase: 'lowercase',
            opacity: false,
            position: 'bottom left',
            show: null,
            showSpeed: 100,
            theme: 'default'
        }
    };
</script>
<script>

    function changeicon(id, icon) {
        $.ajax({
            type: 'post',
            url: '/admin/category/altericon',
            data: {icon: icon, id: id, _token: '{{csrf_token()}}'},
            success: function (data) {
                layer.msg(data);
            },
        });
    }


    function changeColor(id, color) {
        $.ajax({
            type: 'post',
            url: '/admin/category/altericoncolor',
            data: {color: color, id: id, _token: '{{csrf_token()}}'},
            success: function (data) {
                layer.msg(data);
            },
        });
    }

    function deletecate(id) {


        layer.confirm('您是否确定删除?', {
            btn: ['是', '否'] //按钮
        }, function () {
            $.ajax({
                type: 'post',
                url: '/admin/carousel/' + id,
                data: {_token: '{{csrf_token()}}'},
                success: function (data) {

                    if (data == '删除成功') {
                        layer.msg(data);
                        $('#row_' + id).hide();
                    }
                    else
                    {
                        layer.msg('删除失败');
                    }
                },
            });
        }, function () {

        });


    }
</script>

@endsection