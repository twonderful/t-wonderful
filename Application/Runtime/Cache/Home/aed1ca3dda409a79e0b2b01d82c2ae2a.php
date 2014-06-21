<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk"/>
<title>T-精彩（t-wonderful)-精彩Web分享</title>
<link rel="shortcut icon" href="/Public/images/title-logo.gif"/>
<meta name="keywords" content="首页" />
<meta name="description" content="首页 "/>
<meta name="MSSmartTagsPreventParsing" content="True"/>
<meta http-equiv="MSThemeCompatible" content="Yes"/>
 	<link rel="stylesheet" href="/Public/css/home/core.css"/>
  <link rel="stylesheet" href="/Public/css/home/read.css"/>
    <!-- <link rel="stylesheet" href="/Public/css/home/test.css"/> -->
 	<script src="/Public/js/jquery.min.js" type="text/javascript"></script>
 	<script src="/Public/js/home.core.js" type="text/javascript"></script>
</head>
<body>
	<div class="navbar">
		<h1 class="logo"><img src="/Public/images/logo.png" title="" alt="logo"/></h1>
    <a href="" class="mindex "><i class="icon icon-house"></i> 主 页</a>
		<a  class="search" href="javascript:toggleSearch();">快速定位？</a>
		<ul class="menu">
			<li ><a href="/Blog/index.html" class="active">博 客</a></li>
			<li><a href="">资 源</a></li>
		</ul>
	</div>
	<div class="search-model">
			 <div class="search-body">
         
              <?php if(is_array($Tags)): $i = 0; $__LIST__ = $Tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="" class="btn btn-warning btn-mgr-1"><?php echo ($tag["tag"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> 

       </div>
       <div class="search-footer">
          <a href="javascript:toggleSearch();" class="btn-colose"><--- 关 闭</a>
       </div>
		</div>
	<div class="container">
		<div class="main">
			<div class="header">
				 <ul class="submenu">
					<li><a href=""><i class="icon icon-house"></i> 前端</a></li>
					<li><a href="">PHP</a></li>
					<li><a href="">ThinkPHP</a></li>
					<li><a href="">Magento</a></li>
					<li><a href="">SEO</a></li>
				</ul>
			</div>
			<div class="content" id="content">
        <div class="title">
				 <h2><?php echo ($blog["title"]); ?></h2>
         <h3> <span><?php echo ($blog["date"]); ?></span> <?php  $arrTags=array(); $tagStrs=""; $tagStr=$blog["tags"];if($tagStr!=null&&$tagStr!=""){ $arrTags=explode(",", $tagStr); } for ($i=0; $i <count($arrTags); $i++) { echo "<span class='lable'>".$arrTags[$i]."</span> "; }?>
              <span class="op"><?php echo ($blog["count"]["click"]); ?></span>
          </h3>
        </div>
         <div class="content-body">
            <?php echo ($blog["content"]); ?>
         </div>
         <div class="content-footer">

         </div>
			</div>
      <div class="footer">

      </div>
		</div>
		
	</div>
</body>
</html>