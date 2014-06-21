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
                  if(data.url!=null&&data.url!=""){
                    window.location.href=data.url;
                  }else{
                    window.history.back();
                  } 
                },1000);
              }else{
                $('.Validform_info').html(data.message);
                setTimeout(function(){
                  window.location.reload();
                },1000);
              }
          }
        });
})

    function customWebsite(url){
      var Isname = false;
      var Islink = false;
      var webName = $('#website-name').val();
      var webLink = $('#website-link').val();
      if(webName==null||webName==""){
         $('#website-name').next('p').removeClass('hide');
         Isname=false;
      }else if(webName.length>0&&webName.length<7){
           $('#website-name').next('p').addClass('hide');
           Isname=true;
      }else{
        $('#website-name').next('p').removeClass('hide');
         Isname=false;
      }

      if(webLink==null||webLink==""){
         $('#website-link').parent().next('p').removeClass('hide');
         Islink=false;
      }else{
         if(IsURL(webLink)){
            $('#website-link').parent().next('p').addClass('hide');
              Islink=true;
         }else{
          $('#website-link').parent().next('p').removeClass('hide');
          Islink=false;
         }
      }

      if(Isname&&Islink){
        $.ajax({
          url:url,
          type:'POST',
          data:{name:webName,link:webLink},
          dataType:'json',
          success:function(data){
            var wsId = data.dbid;
            var wsName = data.wsName;
            var wsLink = data.wsLink;
            $('#website_id').val(wsId);
            $('#website_name').val(wsName);
            $('#website_link').val(wsLink);
            $('#sourceModal').modal('hide');
          },
          error:function(e){
            alert("操作失败");
          }
        });
      }
    }

    function systemWebsite(wsId,wsName,wsLink){
          $('#website_id').val(wsId);
          $('#website_name').val(wsName);
          $('#website_link').val(wsLink);
          $('#sourceModal').modal('hide');
    } 

     function showUrlImg(){
        var imgUrl = $('#image_url').val();
        $('#image_show').attr('src',imgUrl);
      }


