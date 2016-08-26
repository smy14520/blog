@extends('layout.admin')
@section('content')
    <!--面包屑导航 开始-->
<link rel="stylesheet" href="{{asset('resources/org/webuploade/zyUpload.css')}}">
<link rel="stylesheet" href="{{asset('resources/org/webuploade/zyPopup/css/zyPopup.css')}}">
<script type="text/javascript" src="{{asset('resources/org/webuploade/zyPopup/js/zyPopup.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/webuploade/zyFile.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/org/webuploade/zyUpload.js')}}"></script>
<script ></script>
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->

    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">

            <table class="add_tab">
                <tbody>

<tr>


    <h1 style="text-align:center;">上传轮播图片</h1>
    <div id="upload" class="demo">

    </div>

</tr>

                </tbody>
            </table>

    </div>
















<script>
    $(function(){
        // 初始化插件
        $("#upload").zyUpload({
            width            :   "650px",                 // 宽度
            height           :   "400px",                 // 宽度
            itemWidth        :   "120px",                 // 文件项的宽度
            itemHeight       :   "100px",                 // 文件项的高度
            //url              :   "/upload/UploadAction",  // 上传文件的路径
            url              :   "{{url('admin/upload?_token=')}}{{csrf_token()}}",
            multiple         :   true,                    // 是否可以多个文件上传
            dragDrop         :   true,                    // 是否可以拖动上传文件
            del              :   true,                    // 是否可以删除文件
            finishDel        :   false,  				  // 是否在上传文件完成后删除预览
            /* 外部获得的回调接口 */
            onSelect: function(selectFiles, allFiles){    // 选择文件的回调方法  selectFile:当前选中的文件  allFiles:还没上传的全部文件
                console.info("当前选择了以下文件：");
                console.info(selectFiles);
            },
            onProgress: function(file, loaded, total){    // 正在上传的进度的回调方法
                console.info("当前正在上传此文件：");
                console.info(file.name);
                console.info("进度等信息如下：");
                console.info(loaded);
                console.info(total);
            },
            onDelete: function(file, files){              // 删除一个文件的回调方法 file:当前删除的文件  files:删除之后的文件
                console.info("当前删除了此文件：");
                console.info(file.name);
            },
            onSuccess: function(file, response){          // 文件上传成功的回调方法
                console.info("此文件上传成功：");
                console.info(file.name);
            },
            onFailure: function(file, response){          // 文件上传失败的回调方法
                console.info("此文件上传失败：");
                console.info(file.name);
            },
            onComplete: function(response){           	  // 上传完成的回调方法
                console.info("文件上传完成");
                console.info(response);
            }
        });

    });

    $(function(){
        $("#uploadForm").append('{{csrf_field()}}')
        });

</script>

@endsection