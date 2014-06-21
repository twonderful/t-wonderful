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

    <title>首页-后台管理</title>

    <!-- Bootstrap core CSS -->
    <link href="/Public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/css/font-awesome.min.css">
    <link href="/Public/css/package/jquery.vegas.css" rel="stylesheet">
    <link href="/Public/css/admin/signin.css" rel="stylesheet">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/css/font-awesome-ie7.min.css">
    <![endif]-->
    
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="/Public/js/jquery.min.js"></script>
    <script src="/Public/js/bootstrap.js"></script>
    <script src="/Public/js/package/jquery.vegas.js"></script>
    <script type="text/javascript">
          $(function() {
              $.vegas({
                src:'<?php echo '/Public' ?>/images/bj/bj-2.jpg',
                fade:1000,
                align:       'center',
                valign:      'center',
              });
            });
    </script>
    
  </head>

  <body>
    <div class="container">
      
      <form id="form" class="form-signin" role="form">
        <h2 class="form-signin-heading">Administrator 登录 </h2>
        <input type="text" id="uemail" name="uemail" class="form-control" placeholder="邮箱" value="" required autofocus>
        <input type="password" id="upwd" name="upassword" class="form-control" placeholder="密码" required>
<!--         <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label> -->
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="submit_login('/Admin/Index/checkLogin');">登录</button>
      </form>
       <div id="eInfo" class="alert alert-danger" style="width:360px;margin:40px auto;display:none">
         <span id="sInfo">你输入的邮箱格式错误。</span><!-- 1、你输入的邮箱格式错误，2、你输入的Email 未找到。3、你输入的密码错误。 -->
           <a href="javascript:showInfo(0,'closeThit');" class="pull-right pull-right" style="color:#A94442"><i class="icon-remove pull-right"></i></a></div>   
    </div>
  </body>
  <script type="text/javascript">
    document.onkeydown = function (e) {
      var theEvent = window.event || e;//兼容IE和FF
      var code = theEvent.keyCode || theEvent.which;
      if (code == 13) {
        submit_login('/Admin/Index/checkLogin');
       }
    }   
    function checkEmail(email){ 
      var re = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
      var result = re.test(email); 
      return result;  
    } 
    function submit_login(url){
      var email = $('#uemail').val();
      var password = $('#upwd').val();
      var eInfo="";
      if(email!=null&&email!=""){
        if(password!=null&&password!=""){
            if(checkEmail(email)){
                checkUser(url);
            }else{
              showInfo(1,'邮箱格式错误。');
            }
        }else{
          showInfo(1,'请输入密码。');
        }
      }else{  
        showInfo(1,'请输入邮箱。');
      }
    }  
    function showInfo(status,message){
      var eInfo = $('#eInfo');
      var sInfo = $('#sInfo');
      if(status>0){
        eInfo.show();
      }else{
        eInfo.hide();
      }
      sInfo.text(message);
    } 
function checkUser(url){ 
  var data = $("form").serialize(); 
          $.ajax({
            url: url,
            type: 'post',
            data: data,
            dataType: 'json',
            success:function(rData){
              if(rData.status>0){
                window.location.href=rData.url;
              }else{
                showInfo(1,rData.message);
              }
            },
           error:function(){
              alert("error");
           }
        });
}
</script> 
</html>