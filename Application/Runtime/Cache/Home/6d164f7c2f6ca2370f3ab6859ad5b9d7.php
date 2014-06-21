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
    <!-- <link rel="stylesheet" href="/Public/css/home/test.css"/> -->
 	<script src="/Public/js/jquery.min.js" type="text/javascript"></script>
 	<script src="/Public/js/home.core.js" type="text/javascript"></script>
</head>
<body>
  	<div class="navbar">
		<h1 class="logo"><img src="/Public/images/logo.png" title="" alt="logo"/></h1>
    <a href="" class="mindex active"><i class="icon icon-house"></i> 主 页</a>
		<a  class="search" href="javascript:toggleSearch();">快速定位？</a>
		<ul class="menu">
			<li><a href="">站 点</a></li>
			<li><a href="/Blog/index.html">博 客</a></li>
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
					<li><a href=""><i class="icon icon-house"></i> 全 部</a></li>
					<li><a href="">视 频</a></li>
					<li><a href="">图 片</a></li>
					<li><a href="">文 字</a></li>
					<li><a href="">音 乐</a></li>
				</ul>
			</div>
			<div class="content" id="content">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$blog): $mod = ($i % 2 );++$i;?><div class="box">
          <div class="web">
            <div class="web-top">
                <ul class="webinfo">
                	<li class="infotime fl"><?php echo ($blog["date"]); ?></li>
                	<li class="infowebsite fr"><a href="<?php echo ($web["website"]["link"]); ?>"><?php echo ($blog["titile"]); ?></a></li>
                </ul>
                <a href="/blog/<?php echo ($blog["dbid"]); ?>.html" target="_blank"><img src="<?php echo ($blog["image_url"]); ?>"></a>
            </div>
             <div class="web-content">
             <a href="<?php echo ($blog["source_link"]); ?>" title="<?php echo ($blog["title"]); ?>" target="_blank">
                <?php switch($blog["type"]): case "1": ?><i class="icon-film"></i><?php break;?>
                    <?php case "2": ?><i class="icon-picture"></i><?php break;?>
                    <?php case "3": ?><i class="icon-book"></i><?php break;?>
                    <?php case "4": ?><i class="icon-headphones"></i><?php break;?>
                    <?php default: ?>---<?php endswitch;?> <?php echo ($blog["title"]); ?></a>
              <h3><?php echo ($blog["introduction"]); ?></h3>
            </div>
            <div class="web-bottom">
              <ul class="lb">
                <?php  $arrTags=array(); $tagStrs=""; $tagStr=$blog["tags"];if($tagStr!=null&&$tagStr!=""){ $arrTags=explode(",", $tagStr); } for ($i=0; $i <count($arrTags); $i++) { $labelType = array("default","primary","info","success","danger","warning"); $typeId=mt_rand(0,5); echo "<li><span class='label ".$labelType[$typeId]."'>".$arrTags[$i]."</span></li> "; }?>
              </ul>
              <span class="op"><?php echo ($blog["count"]["click"]); ?></span>
            </div> 
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		
	</div>
</body>
</html>