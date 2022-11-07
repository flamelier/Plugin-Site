/*
Patsy Panel is under the PolyForm Commercial Software License with specific Terms found in the LICENSE folder in the root of the project and a free trial is available.
Copyright (C) 2022 Computer Wolf LLC.
*/

$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash;
	    var $target = $(target);
	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top - 150
	    }, 1100, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});