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
                        <th class="tc">审核状态</th>
                        <th class="tc">ID</th>
                        <th>标题</th>

                        <th>点击</th>
                        <th>发布人</th>
                        <th>更新时间</th>
                        <th>评论</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr id="row_{{$v->id}}">
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$v->status}}">
                        </td>
                        <td class="tc">59</td>
                        <td>
                            <a href="#">{{$v->title}}</a>
                        </td>

                        <td>{{$v->view}}</td>
                        <td>{{$v->created_by}}</td>
                        <td>{{$v->updated_at}}</td>
                        <td></td>
                        <td>
                            <a href="{{url('admin/article/'.$v->id.'/edit')}}">修改</a>
                            <a href="#" onclick="deletecate({{$v->id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach



                </table>






                <div class="page_list">
                  {{$data->links()}}
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
    function deletecate(id)
    {


        layer.confirm('您是否确定删除?', {
            btn: ['是','否'] //按钮
        }, function(){
            $.ajax({
                type:'delete',
                url:'/admin/article/'+id,
                data:{_token:'{{csrf_token()}}'},
                success:function(data){
                    layer.msg(data);
                    if(data='删除成功')
                    {
                        $('#row_'+id).hide();
                    }
                },
            });
        }, function(){

        });


    }
</script>


@endsection