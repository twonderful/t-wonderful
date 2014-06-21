 $(function () {
    $.scrollUp(); /* 鼠标置顶按钮初始化 */
    $('input').iCheck({
      checkboxClass: 'icheckbox_square',
      radioClass: 'iradio_square',
      increaseArea: '20%' // optional
    });
    /*  选择全部checkbox*/
     $('input[name=checkbox_all]').on('ifChecked', function(event){
      $('input').iCheck('check');
    });
     $('input[name=checkbox_all]').on('ifUnchecked', function(event){
      $('input').iCheck('uncheck');
    });
     /*delete 是否可选择？*/
     $('input').on('ifChecked', function(event){
      $('.checkbox-opreat').removeClass('disabled');
    });
     $('input').on('ifUnchecked', function(event){
      ifDeletBtn();
    });
});
function getDbids(){
  var arrDbid=new Array();
  $('input[type=checkbox]:checked').each(function(num){
      var dbid = $(this).val();
      if(dbid>0){
        arrDbid.push(dbid);
      }
  });
  return arrDbid.join(",");
}

/*  统计当前所有checkbox选中的个数:如果为0 则delete按钮disabled，*/
function ifDeletBtn(){
   var checkedNum = $('input[type=checkbox]:checked').size();
   if(checkedNum<=0){
         $('.checkbox-opreat').addClass('disabled');
    }else{
      $('.checkbox-opreat').removeClass('disabled');
    }
}


//验证是否有效的Url return true/false
function IsURL(str_url) { 
  var strRegex="^((https|http|ftp|rtsp|mms)?://)"
    + "?(([0-9a-z_!~*'().&=+$%-]+: )?[0-9a-z_!~*'().&=+$%-]+@)?" // ftp的user@
    + "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
    + "|" // 允许IP和DOMAIN（域名）
    + "([0-9a-z_!~*'()-]+\.)*" // 域名- www.
    + "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
    + "[a-z]{2,6})" // first level domain- .com or .museum
    + "(:[0-9]{1,4})?" // 端口- :80
    + "((/?)|" // a slash isn't required if there is no file name
    + "(/[0-9a-z_!~*'().;?:@&=+$,%#-]+)+/?)$";
  var re=new RegExp(strRegex); 
  return re.test(str_url);
}

/* 弹窗提示 信息*/
function checkChanges(url,title){  /* 批量删除及操作*/
  $.Zebra_Dialog('<strong>'+title+'</strong>', {
      'type':     'question',
      'title':    '提示',
      'buttons': [
                    {caption: 'Yes', callback: function() {
                      var dbids = getDbids(); 
                      $.ajax({
                         url:url+"&dbids="+dbids,
                         type:"GET",
                         dataType:'json',
                         success:function(data){
                            showDialog(data.status,data.message);
                          },
                         error:function(e){
                            showDialog(0,"数据错误");
                          }
                      });

                    }},
                    {caption: 'No', callback: function() {}},
                  ],
      'animation_speed_hide':0,
  });
}


function checkDeletes(url,title){  /* 批量删除及操作*/
  $.Zebra_Dialog('<strong>'+title+'</strong>', {
      'type':     'question',
      'title':    '提示',
      'buttons': [
                    {caption: 'Yes', callback: function() {
                      var dbids = getDbids(); 
                      $.ajax({
                         url:url+"?dbids="+dbids,
                         type:"GET",
                         dataType:'json',
                         success:function(data){
                            showDialog(data.status,data.message);
                          },
                         error:function(e){
                            showDialog(0,"数据错误");
                          }
                      });

                    }},
                    {caption: 'No', callback: function() {}},
                  ],
      'animation_speed_hide':0,
  });
}
function checkDialog(url,title){  /* 单个修改及操作*/
  $.Zebra_Dialog('<strong>'+title+'</strong>', {
      'type':     'question',
      'title':    '提示',
      'buttons': [
                    {caption: 'Yes', callback: function() {
                      $.ajax({
                         url:url,
                         type:"GET",
                         dataType:'json',
                         success:function(data){
                            showDialog(data.status,data.message);
                          },
                         error:function(e){
                            showDialog(0,"数据错误");
                          }
                      });

                    }},
                    {caption: 'No', callback: function() {}},
                  ],
      'animation_speed_hide':0,
  });
}
function showDialog(status,message){
  if(status){
     new $.Zebra_Dialog('<strong>'+message+'</strong>',
     {
        'type':     'information',
        'title':    '提示',
        'animation_speed_hide':250,
        'auto_close':1000,
        'onClose':function(){
            window.location.reload();
        }
      });
  }else{
       new $.Zebra_Dialog('<strong>'+message+'</strong>',
       {
          'type':     'error',
          'title':    '提示',
          'animation_speed_hide':250,
          'auto_close':1000,
        });
  }      
    
}