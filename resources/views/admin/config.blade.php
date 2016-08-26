@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/index')}}">首页</a> &raquo;</a> &raquo; 网站配置
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	{{--<div class="result_wrap">--}}
        {{--<div class="result_title">--}}
            {{--<h3>快捷操作</h3>--}}
        {{--</div>--}}
        {{--<div class="result_content">--}}
            {{--<div class="short_wrap">--}}
                {{--<a href="#"><i class="fa fa-plus"></i>新增文章</a>--}}
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--结果集标题与导航组件 结束-->
<div class="result_wrap">
    <div class="result_title">
@if(count($errors)>0)
    <div class="mark">


            <p>{{$errors}}</p>

    </div>
@endif
    </div>
</div>
    <div class="result_wrap" id="minicolor">
        <form action="{{url('admin/config')}}" method="post">
            <table class="add_tab">
                <tbody>
     {{csrf_field()}}


                        <th width="120">站点标题：</th>
                        <td>
                            <input type="text" name="config_title" value="{{isset($data->config_title)?$data->config_title:''}}">
                           {{--<span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>--}}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>短语：</th>
                        <td>
                            <input type="text" class="lg" name="config_quotation" value="{{isset($data->config_title)?$data->config_quotation:''}}">
                            <p>标题可以写30个字</p>
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