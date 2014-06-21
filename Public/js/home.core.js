$(function () {
    var boxs = $('.box'); 
    boxs.each(function(){
    	$(this).hover(function(){
        	$(this).find('ul.webinfo').fadeIn();
	     },function(){
	        $(this).find('ul.webinfo').fadeOut();
	     });
    });
});

function toggleSearch(){
	var search = $('.search');
	var searchModel = $('.search-model');
	var leftVal =searchModel.css('left');
	if(leftVal==="200px"){
		search.removeClass('searchactive');
		searchModel.animate({left:'-200px'});
	}else{
		searchModel.animate({left:'200px'});
		search.addClass('searchactive');
	}
}