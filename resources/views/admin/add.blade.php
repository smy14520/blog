@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
<div class="result_wrap">
    <div class="result_title">
@if(count($errors)>0)
    <div class="mark">

        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif
    </div>
</div>
    <div class="result_wrap" id="minicolor">
        <form action="{{url('admin/category')}}" method="post">
            <table class="add_tab">
                <tbody>
     {{csrf_field()}}
     <tr>
         <th width="120"><i class="require">*</i>分类：</th>
         <td>
             <select name="paraent">
                 <option value="0">顶级栏目</option>
                 @foreach($data as $v)
                     <option value="{{$v->cate_id}}"><?php echo str_repeat('&nbsp;',$v->lev*2); ?>{{$v->cate_name}}</option>
                 @endforeach
             </select>
         </td>
     </tr>

                        <th width="120">标题：</th>
                        <td>
                            <input type="text" name="title">
                           {{--<span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>--}}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>栏目简介-短语：</th>
                        <td>
                            <input type="text" class="lg" name="quotation">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>Icon：</th>
                        <td>
                            <input type="text" class="sm" name="icon">
                            <span><i class="fa fa-exclamation-circle yellow"></i>单个字符或数字</span>
                        </td>
                    </tr>

                        <tr>
                            <th><i class="require">*</i>IconColor：</th>
                            <td>
                                <input name="iconcolor"  onchange="" onblur="" type="text" style="width: 60px;height: 15px" class="minicolors" value="">
                                <span><i class="fa fa-exclamation-circle yellow"></i>颜色</span>
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
<style>
#minicolor .minicolors-swatch-color
{
 margin: 0;
}
#minicolor .minicolors-swatch
{
    margin:3px 0px 0px 0px;
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

@endsection