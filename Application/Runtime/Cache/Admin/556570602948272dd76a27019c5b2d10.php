<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/Public/images/title-logo.gif">

    <title>添加-博客</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/Public/css/square/square.css" rel="stylesheet">
   
    <link href="/Public/css/package/layout.css" rel="stylesheet">
    <link href="/Public/umeditor/themes/default/css/umeditor.css" rel="stylesheet">
    <link href="/Public/css/package/jquery.tagsinput.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar header.导航栏 -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><i class="main-logo"> </i><span class="main-logo-font">Admin</span></a>
            </div>

            <div class="navbar-collapse collapse">
              <!-- 获取当前的模块操作 -->
              <?php  $controller=explode('/','/Admin/Blog/addinfo')[2];?>

              <ul class="nav navbar-nav">
                <?php if($controller=='Index'||$controller=='index'): ?><li class="active">
                  <?php else: ?> <li><?php endif; ?>
                  <a href="/Admin/Index/index"><i class="icon-home"></i> 首页</a></li>
                <?php if($controller=='Web' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 内容 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/Web/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Web/listall/status/0/type/0"><i class="icon-spinner"></i>&nbsp;&nbsp; 审核</a></li>
                    <li><a href="/Admin/Web/listall/status/1/type/0"><i class="icon-unlock"></i>&nbsp;&nbsp;Enalbe</a></li>
                    <li><a href="/Admin/Web/listall/status/2/type/0"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                  </ul>
                </li>
                <?php if($controller=='Tag' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 标签 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/Tag/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Tag/listall/status/0"><i class="icon-spinner"></i>&nbsp;&nbsp; 审核</a></li>
                    <li><a href="/Admin/Tag/listall/status/1"><i class="icon-unlock"></i>&nbsp;&nbsp;Enalbe</a></li>
                    <li><a href="/Admin/Tag/listall/status/2"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                  </ul>
                </li>
                 <?php if($controller=='Website' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 网站 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/Website/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Website/listall/status/0"><i class="icon-spinner"></i>&nbsp;&nbsp; 审核</a></li>
                    <li><a href="/Admin/Website/listall/status/1"><i class="icon-unlock"></i>&nbsp;&nbsp;Enalbe</a></li>
                    <li><a href="/Admin/Website/listall/status/2"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                  </ul>
                </li>
                <?php if($controller=='Blog' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 博客 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/Blog/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Blog/listall/status/0"><i class="icon-spinner"></i>&nbsp;&nbsp; 审核</a></li>
                    <li><a href="/Admin/Blog/listall/status/1"><i class="icon-unlock"></i>&nbsp;&nbsp;Enalbe</a></li>
                    <li><a href="/Admin/Blog/listall/status/2"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                     <li class="divider"></li>
                    <li><a href="/Admin/Blog/listall/status/2"><i class="icon-folder-close-alt"></i> 所属分类</a></li>
                  </ul>
                </li>
               <?php if($controller=='User' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 用户 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/User/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/User/listall/status/0/type/0"><i class="icon-spinner"></i>&nbsp;&nbsp; 审核</a></li>
                    <li><a href="/Admin/User/listall/status/1/type/0"><i class="icon-unlock"></i>&nbsp;&nbsp;Enalbe</a></li>
                    <li><a href="/Admin/User/listall/status/2/type/0"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                  </ul>
                </li>
                
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user-md"></i> <?php echo $_SESSION['admin']['name']?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-wrench"></i>&nbsp;&nbsp; 设置</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Blog/loginOut"><i class="icon-off"></i>&nbsp;&nbsp; 退出</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
          
    </div>

   <div class="main-container">

      <div class="projects-header page-header">
          <h3><i class="icon-plus"></i> 添加</h3>
      </div>

      <!-- 添加表单 -->
      <form id="form-addInfo" class="form-horizontal" role="form" action="/Admin/Blog/saveInfo" >
        </br>
        <div class="form-group">
          <label class="col-sm-0 control-label input-lg">标题</label>
          <div class="col-sm-8">
            <input type="text" class="form-control input-lg" name="title" placeholder="标题" datatype="*4-32" errormsg="<i class='icon-warning-sign'></i> 标题在4~32位之间"  value="<?php echo ($web["title"]); ?>" nullmsg="<i class='icon-warning-sign'></i> 请填写信息！" />
          </div>
          <div class="Validform_checktip">
             <div class="info">标题至少4个字符,最多32个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
          </div>
        </div>   

        <div class="form-group">
          <label class="col-sm-0 control-label input-lg">正文</label>
          <div class="col-sm-8">
            <!-- 加载编辑器的容器 -->
            <script id="umeditor" name="content" type="text/plain">
            </script>
            <!-- 实例化编辑器 -->
          
          </div>
          <div class="Validform_checktip">
             <div class="info">标题至少4个字符,最多32个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
          </div>
        </div>   

        </br>
        </br>

         <div class="form-group">
          <label class="col-sm-0 control-label input-lg" placeholder="分享介绍">描述</label>
          <div class="col-sm-8">
            <textarea name="introduction" class="form-control" rows="3" datatype="*4-120" errormsg="<i class='icon-warning-sign'></i> 描述在4~120位之间" nullmsg="<i class='icon-warning-sign'></i> 请填写信息！"><?php echo ($web["introduction"]); ?></textarea>
          </div>
          <div class="Validform_checktip">
             <div class="info">描述至少4个字符,最多120个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
          </div>
        </div>

        <br>
        <div class="form-group" id="form-lable">
          <label for="inputTag3" class="col-sm-0 control-label input-lg">标签</label>
          <input type="hidden" name="type_id" value="1"/>
          <div class="col-sm-2 input-lg">
           <div class="btn-group ">
              <button type="button" class="btn btn-default input-lg">请选择所属分类</button>
              <button type="button" class="btn btn-default dropdown-toggle input-lg" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="javascript:void(0)"><i> 1 </i> Action</a></li>
                <li><a href="javascript:void(0)"><i> 2 </i> Another action</a></li>
                <li><a href="javascript:void(0)"><i> 3 </i> Something else here</a></li>
                <li><a href="javascript:void(0)"><i> 4 </i> Separated link</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 input-lg">
              <input  type="text" class="form-control input-lg" name="tags" value="" id="tags" datatype="*1-24"  nullmsg="<i class='icon-warning-sign'></i> 请填写信息！"  />
          </div>
        </div>

        <br>

       <br>
       <div class="form-group">
          <label for="inputLink3" class="col-sm-0 control-label input-lg">封面</label>
          <div class="col-sm-3" id="net_img">            
              <textarea name="image_url" class="form-control" rows="6" id="image_url" datatype="url" errormsg="<i class='icon-warning-sign'></i> 图片链接无效" nullmsg="<i class='icon-warning-sign'></i> 请填写信息！"></textarea>
          </div>
           <div class="col-sm-1">            
               <button type="button" onclick="showUrlImg()" class="btn btn-info btn-lg btn-mg-1"><i class="icon-circle-arrow-right"></i> 预览</button>
              
          </div>
          <div class="col-sm-3">            
               <img id="image_show" src="/Public/images/no-picture.jpg" class="img-thumbnail img-size-1"/>
          </div>
        </div>

        <br>
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-4">
            <button type="reset" class="btn btn-default btn-lg"><i class="icon-repeat"></i> 重置</button>
            &nbsp;&nbsp;&nbsp;   
            <button id="btn_sub" type="button" class="btn btn-success btn-lg"><i class="icon-circle-arrow-right"></i> 确定</button>
          </div>
        </div>
      </form>
      
    </div>    
    

    <a id="scrollUp" href="#top" title="" style="position: fixed; z-index: 2147483647; display: none;"> </a>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/bootstrap.js"></script>
    <script src="/Public/js/package/validform_v5.3.2_min.js"></script>
    <script src="/Public/js/package/jquery.tagsinput.js"></script>  
    <!-- 配置文件 -->
    <script src="/Public/umeditor/umeditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script src="/Public/umeditor/umeditor.min.js"></script> 
    <script type="text/javascript">
    $('#tags').tagsInput({
        'height':'52px', //设置高度
        'width':'100%',  //设置宽度
      });
    var um = UM.getEditor('umeditor',{});
      $(function(){
        var getInfoObj=function(){
            return  $(this).parents(".form-group").children(".Validform_checktip").children(".info");
          }
        
        $("[datatype]").focusin(function(){
          if(this.timeout){clearTimeout(this.timeout);}
          var infoObj=getInfoObj.call(this);
          if(infoObj.siblings(".Validform_right").length!=0){
            return; 
          }
          infoObj.show().siblings().hide();
          
        }).focusout(function(){
          var infoObj=getInfoObj.call(this);
          this.timeout=setTimeout(function(){
            infoObj.hide().siblings(".Validform_wrong,.Validform_loading").show();
          },0);
          
        });

        var demo = $("#form-addInfo").Validform({
          btnSubmit:"#btn_sub",
          tiptype:2,
          postonce:true,
          ajaxPost:true,
          callback:function(data){ 
              if(data.status==1){
                $('.Validform_info').html(data.message);
                setTimeout(function(){
                  window.location.href=data.url;
                },1000);
              }else{
                $('.Validform_info').html(data.message);
                setTimeout(function(){
                  window.location.reload();
                },2000);
              }
          }
        }); 
      })
    </script>
  </body>
</html>