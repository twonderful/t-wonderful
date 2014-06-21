function tgLableselect(){        
  var hide= $("#lable-select").is(":hidden");//是否隐藏
  var show= $("#lable-select").is(":visible");//是否可见
  if(hide){
    $("#lable-select").slideDown(200);
  }else{
    $("#lable-select").slideUp(200);
  }
}