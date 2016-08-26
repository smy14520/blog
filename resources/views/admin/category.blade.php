@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->

    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>



        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>

                        <th class="tc">Icon</th>
                        <th class="tc">Color</th>
                        <th>标题</th>
                        <th>quotation</th>

                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>评论</th>
                        <th>操作</th>
                    </tr>
                    @foreach($category as $v)

                    <tr id="row_{{$v->cate_id}}">
                        <td class="tc"><input type="checkbox" name="id[{{$v->cate_id}}]" value="{{$v->cate_id}}"></td>
                        <td class="tc">
                            <input type="text" onchange="changeicon({{$v->cate_id}},this.value)" value="{{$v->icon}}">
                        </td>
                        <td class="tc"><input onchange="" onblur="changeColor({{$v->cate_id}},this.value)" type="text" style="width: 55px" class="minicolors" value="{{$v->icon_color}}"></td>
                        <td>
                            <a href="#">{{$v->cate_name}}</a>
                        </td>
                        <td></td>
                        <td>2</td>
                        <td>{{$v->updated_at}}</td>
                        <td></td>

                        <td>
                            <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}">修改</a>
                            <a href="#" onclick="deletecate({{$v->cate_id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach



                </table>






                <div class="page_list">
                {{$category->links()}}
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

    function changeicon(id,icon)
    {
    $.ajax({
       type:'post',
       url:'/admin/category/altericon',
        data:{icon:icon,id:id,_token:'{{csrf_token()}}'},
        success:function(data){
            layer.msg(data);
        },
    });
    }


    function changeColor(id,color)
    {
        $.ajax({
            type:'post',
            url:'/admin/category/altericoncolor',
            data:{color:color,id:id,_token:'{{csrf_token()}}'},
            success:function(data){
                layer.msg(data);
            },
        });
    }

   function deletecate(id)
    {


        layer.confirm('您是否确定删除?', {
            btn: ['是','否'] //按钮
        }, function(){
            $.ajax({
                type:'delete',
                url:'/admin/category/'+id,
                data:{_token:'{{csrf_token()}}'},
                success:function(data){

                    if(data='删除成功')
                    {
                        layer.msg(data);
                        $('#row_'+id).hide();
                    }
                    else
                    {
                        layer.msg('删除失败');
                    }
                },
            });
        }, function(){

        });


    }
</script>

@endsection