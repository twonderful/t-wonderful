<?php if (!defined('THINK_PATH')) exit();?>  
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="我们不是精彩的缔造者，我们只是精彩的分享者。">
    <meta name="author" content="我们不是精彩的缔造者，我们只是精彩的分享者。">
    <link rel="shortcut icon" href="/Public/images/title-logo.gif">
    <title>首页-后台管理</title>
    <!-- Bootstrap core CSS -->
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="/Public/css/package/layout.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
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
                    <li><a href="/Admin/Web/listall/status/1/type/0"><i class="icon-unlock"></i>&nbsp;&nbsp; Enalbe</a></li>
                    <li><a href="/Admin/Web/listall/status/2/type/0"><i class="icon-lock"></i>&nbsp;&nbsp; Disable</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Web/listtype/status/0"><i class="icon-folder-close-alt"></i>&nbsp;&nbsp; 所属分类</a></li>
                  </ul>
                </li>
                <?php if($controller=='Type' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 分类 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                   <li><a href="/Admin/Type/addinfo"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Type/listall"><i class="icon-list"></i>&nbsp;&nbsp; 列表</a></li>
                  </ul>
                </li>
                <?php if($controller=='Tag' ): ?><li class="active dropdown">
                  <?php else: ?> <li class="dropdown"><?php endif; ?> 
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 标签 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/Admin/Tag/listweb"><i class="icon-plus"></i>&nbsp;&nbsp; 添加</a></li>
                    <li class="divider"></li>
                    <li><a href="/Admin/Tag/listall"><i class="icon-list"></i>&nbsp;&nbsp; 列表</a></li>
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
                    <li><a href="/Admin/Blog/listtype/status/0"><i class="icon-folder-close-alt"></i>&nbsp;&nbsp; 所属分类</a></li>
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
                    <li><a href="/Admin/Index/loginOut"><i class="icon-off"></i>&nbsp;&nbsp; 退出</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
          
    </div>

   <div class="main-container">

      <div class="projects-header page-header">
          <h3>非缔造  纯分享</h3>
          <small>- - - 我们不是精彩的缔造者，我们只是精彩的分享者。</small>
      </div>
      
      <div class="row">

        <div class="col-sm-6 col-md-4 ">  <!-- row  1 -->
          <div class="thumbnail">
            <h3 align="center"> 
                <i class="icon-th-large"></i> 内容管理
            </h3>
            <div class="caption">
              
              <p align="center">发布并分享来自网页世界里的精彩内容。</p>
              <p align="center">
                <a class="btn btn-primary" role="button" href="/Admin/Web/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/Web/listall/status/0/type/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/Web/listall/status/1/type/0"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/Web/listall/status/2/type/0"><i class="icon-lock"></i> Disable</a>
                </p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 ">    <!-- row  2 -->
           <div class="thumbnail">
            <h3 align="center"> 
                 <i class="icon-tags"></i> 标签管理
            </h3>
            <div class="caption">
              <p align="center">给每个精彩内容添加N个标签，分类、快速查找。</p>
              <p align="center">
                <a class="btn btn-primary" role="button" href="/Admin/Tag/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/Tag/listall/status/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/Tag/listall/status/1"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/Tag/listall/status/2"><i class="icon-lock"></i> Disable</a>
              </p>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-md-4 ">   <!-- row  3 -->
         <div class="thumbnail">
            <h3 align="center"> 
               <i class="icon-globe"></i> 热门网站
              </h3>
            <div class="caption">
             
              <p align="center">更多精彩内容都来自于同一网站。</p>
              <p align="center">
                 <a class="btn btn-primary" role="button" href="/Admin/Website/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/Website/listall/status/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/Website/listall/status/1"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/Website/listall/status/2"><i class="icon-lock"></i> Disable</a>
              </p>
            </div>
          </div>
        </div>

      </div>  <!-- end row -->  

      <div class="row">

        <div class="col-sm-6 col-md-4 ">
          <div class="thumbnail">
             <h3 align="center"> 
                <i class="icon-user"></i> 用户管理
              </h3>
            <div class="caption">
             
              <p align="center">用户包括：会员，管理员。</p>
               <p align="center">
                 <a class="btn btn-primary" role="button" href="/Admin/User/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/User/listall/status/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/User/listall/status/1"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/User/listall/status/2"><i class="icon-lock"></i> Disable</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 ">
          <div class="thumbnail">
            <h3 align="center"> 
                <i class="icon-twitter"></i> 网站历程
              </h3>
            <div class="caption">
              
              <p align="center">记录网站的点点滴滴成长历史。</p>
               <p align="center">
                <a class="btn btn-primary" role="button" href="/Admin/Blog/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/Blog/listall/status/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/Blog/listall/status/1"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/Blog/listall/status/1"><i class="icon-lock"></i> Disable</a>
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 ">
         <div class="thumbnail">
           <h3 align="center"> 
               <i class="icon-spinner"></i> 更多内容
              </h3>
            <div class="caption">
              
              <p align="center">挖掘并实现更多功能的展示。</p>
               <p align="center">
                 <a class="btn btn-primary" role="button" href="/Admin/Web/addinfo"><i class="icon-plus"></i> 添加</a>
                <a class="btn btn-info" role="button" href="/Admin/Web/listall/status/0/type/0"><i class="icon-spinner"></i> 审核</a> 
                <a class="btn btn-success" role="button" href="/Admin/Web/listall/status/0/type/0"><i class="icon-unlock"></i> Enable</a></a>
                <a class="btn btn-warning" role="button" href="/Admin/Web/listall/status/0/type/0"><i class="icon-lock"></i> Disable</a>
              </p>
            </div>
          </div>
        </div>

       </div>
    </div>    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/bootstrap.js"></script>
    <script src="/Public/js/package/myweb.js"></script>
    <script src="/Public/js/package/jquery.scrollUp.min.js"></script>
    <a id="scrollUp" href="#top" title="" style="position: fixed; z-index: 2147483647; display: none;"> </a>
  </body>
</html>