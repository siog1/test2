new WOW().init();

$(document).ready(function() {
	$(window).scroll(function() {
  	if($(document).scrollTop() > 40) {
    	$('#time').addClass('change');
    }
    else {
      $('#time').removeClass('change');
    }
  });
});

$(window).scroll(function(){
  parallax();
})

function parallax(){

  var wScroll = $(window).scrollTop();

  $('.parallax-effect').css('margin',(wScroll*0.060)+'px').css('transform:rotate(',(wScroll*2)+'deg)')
}

$('.grid').masonry({
itemSelector: '.grid-item',
columnWidth: '.grid-sizer',
percentPosition: true
});

$(document).ready(function(){
	$('a[href="#search"]').on('click', function(event) {
		$('#search').addClass('open');
		$('#search > form > input[type="search"]').focus();
	});
	$('#search, #search button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			$(this).removeClass('open');
		}
	});
});
