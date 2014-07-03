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

    <title>列表-标签管理</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    <link href="/Public/css/package/layout.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/css/font-awesome.min.css">
    <link href="/Public/css/square/square.css" rel="stylesheet">
    <link href="/Public/css/Zebra_dialog-master/zebra_dialog.css" rel="stylesheet">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/css/font-awesome-ie7.min.css">
    <![endif]-->
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
                    <li><a href="/Admin/Website/loginOut"><i class="icon-off"></i>&nbsp;&nbsp; 退出</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
          
    </div>

<div class="main-container">
      <div class="projects-header page-header">
          <h3 class="clearfix">
              <div class="pull-left"><i class="icon-list"> </i> 列表  </div>
              <a class="btn btn-primary pull-right" href="/Admin/Website/addinfo" role="button">
              <i class="icon-trash icon-plus"></i> 添加 </a> 
          </h3>
        <!-- top opreat bar.导航栏 -->
        <div class="alert alert-info">
  <label>状态：</label>
   <?php if($status==''||$status==null||$status==3): ?><a href="/Admin/Website/listall/status/3" class="btn btn-info">
        <?php else: ?> <a href="/Admin/Website/listall/status/3" class="btn btn-link"><?php endif; ?>
        全部 (<?php echo ($statusCount["allCount"]); ?>)</a>
   <?php if($status==0&&$status!=''&&$status!=null): ?><a href="/Admin/Website/listall/status/0 " class="btn btn-info">
        <?php else: ?> <a href="/Admin/Website/listall/status/0" class="btn btn-link"><?php endif; ?>
      <i class="icon-spinner"></i> 审核  (<?php echo ($statusCount["auditCount"]); ?>)</a>
    <?php if($status==1 ): ?><a href="/Admin/Website/listall/status/1" class="btn btn-info">
        <?php else: ?> <a href="/Admin/Website/listall/status/1" class="btn btn-link"><?php endif; ?>
      <i class="icon-unlock"></i> Enable  (<?php echo ($statusCount["enableCount"]); ?>)</a>
    <?php if($status==2 ): ?><a href="/Admin/Website/listall/status/2" class="btn btn-info">
        <?php else: ?> <a href="/Admin/Website/listall/status/2" class="btn btn-link"><?php endif; ?>
      <i class="icon-lock"></i> Disable  (<?php echo ($statusCount["disableCount"]); ?>)</a>
</div>
      </div>
    <div class="form-horizontal" role="form">
        <!-- top opreat bar.导航栏 -->
      <div class="form-group">
  <div class="checkbox-all">
    <div class="input-group ">
      <span class="input-group-addon">
        <input type="checkbox" name="checkbox_all" value="0">
      </span>
      <span class="form-control">选择全部</span>
    </div>
  </div>
  <?php if($status==0||$status==2): ?><a class="btn btn-default checkbox-opreat disabled" href="javascript:checkChanges('/Admin/Website/checkChanges?status=1','确定批量设置为 Enable？')">
    <i class="icon-unlock"></i> Enable</a>
    <?php else: endif; ?>
  <?php if($status==0||$status==1): ?><a class="btn btn-default checkbox-opreat disabled" href="javascript:checkDialogs('/Admin/Website/checkDeletes?status=2','确定批量设置为 Disable？')">
    <i class="icon-lock"></i> Disable</a>
    <?php else: endif; ?>
      <a class="btn btn-default checkbox-opreat disabled" href="javascript:checkDialogs('/Admin/Website/checkDeletes','确定删除所选择数据？')">
    <i class="icon-trash"></i> Delete</a>
    <?php echo ($page); ?> 
</div>
        
      <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="col-md-0"></th>
                <th class="col-md-2">网站</th>
                <th class="col-md-3">网址</th>
                <th class="col-md-1">状态</th>
                <th class="col-md-4">操作</th>
              </tr>
            </thead>
            <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="col-md-0"><input type="checkbox" name="checkbox_id" value="<?php echo ($vo["dbid"]); ?>"></td>
                <td class="col-md-2"><?php echo ($vo["name"]); ?></td>
                <td class="col-md-4 autoline"><a href="<?php echo ($vo["link"]); ?>" target="_blank"><?php echo ($vo["link"]); ?></a></td>
                <td class="col-md-1">&nbsp;
                   <?php switch($vo["status"]): case "0": ?><i class="icon-spinner"></i><?php break;?>
                    <?php case "1": ?><i class="icon-unlock"></i><?php break;?>
                    <?php case "2": ?><i class="icon-lock"></i><?php break;?>
                    <?php default: endswitch;?>
                </td>
                <td class="col-md-4">
                    <a class="btn btn-default" href="/Admin/Website/editinfo?_id=<?php echo ($vo["dbid"]); ?>"><i class="icon-edit"></i></a>
    <?php if($vo["status"] != 1): ?><a class="btn btn-success" href="javascript:checkDialog('/Admin/Website/changeStatus?dbid=<?php echo ($vo["dbid"]); ?>&status=1','确定设置为 Enable？')"><i class="icon-unlock"></i></a><?php endif; ?>
    <?php if($vo["status"] != 2): ?><a class="btn btn-warning" href="javascript:checkDialog('/Admin/Website/changeStatus?dbid=<?php echo ($vo["dbid"]); ?>&status=2','确定设置为 Disable？')"><i class="icon-lock"></i></a><?php endif; ?>
    <a class="btn btn-danger" href="javascript:checkDialog('/Admin/Website/changeStatus?dbid=<?php echo ($vo["dbid"]); ?>&status=2','确定选择删除？')"><i class="icon-trash"></i></a>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
            </tbody>
          </table>
      </div>

            <!-- top opreat bar.导航栏 -->
         <div class="form-group">
  <div class="checkbox-all">
    <div class="input-group ">
      <span class="input-group-addon">
        <input type="checkbox" name="checkbox_all" value="0">
      </span>
      <span class="form-control">选择全部</span>
    </div>
  </div>
  <?php if($status==0||$status==2): ?><a class="btn btn-default checkbox-opreat disabled" href="javascript:checkChanges('/Admin/Website/checkChanges?status=1','确定批量设置为 Enable？')">
    <i class="icon-unlock"></i> Enable</a>
    <?php else: endif; ?>
  <?php if($status==0||$status==1): ?><a class="btn btn-default checkbox-opreat disabled" href="javascript:checkDialogs('/Admin/Website/checkDeletes?status=2','确定批量设置为 Disable？')">
    <i class="icon-lock"></i> Disable</a>
    <?php else: endif; ?>
      <a class="btn btn-default checkbox-opreat disabled" href="javascript:checkDialogs('/Admin/Website/checkDeletes','确定删除所选择数据？')">
    <i class="icon-trash"></i> Delete</a>
    <?php echo ($page); ?> 
</div>
        </div>
  </div> 
</div>    
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/bootstrap.js"></script>
    <script src="/Public/js/package/admin.all.js"></script>
    <script src="/Public/js/package/jquery.scrollUp.min.js"></script>
    <script src="/Public/js/package/icheck.js"></script>
    <script src="/Public/js/Zebra_dialog-master/zebra_dialog.js"></script>  
    <a id="scrollUp" href="#top" title="" style="position: fixed; z-index: 2147483647; display: none;"> </a>
    <script type="text/javascript">
      $(function(){
         ifDeletBtn();
      });
    </script>
  </body>
</html>