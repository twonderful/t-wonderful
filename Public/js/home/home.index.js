 $(function () {
   var $container = $('#masonry');
        $container.imagesLoaded(function() {
            $container.masonry({
                    itemSelector:'.box',
                    gutterWidth: 0,
                    gutter:0,
                    isAnimated: true,
                });
            });
    var $boxs = $('.box') 
    $boxs.hover(function(){
        $(this).find('dl.fd').fadeIn(800);
      },function(){
        $(this).find('dl.fd').fadeOut();
    });
   
});

$(document).scroll(function(){
     isBottom();
})
function isBottom(){
  var $load= $('#loading');
  var  docHeight= $(document).height(); 
  var  winHeight= $(window).height();
  var scrHeight = $(document).scrollTop();
  //return scrHeight>=docHeight-winHeight;
  var test = docHeight-winHeight;
  if(scrHeight==test){
    $load.show();
  }else{
    $load.hide();
  }
}