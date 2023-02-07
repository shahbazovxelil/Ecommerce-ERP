(function($) {
    "use strict";

	// ______________ Page Loading
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})
	
	// ______________Cover Image
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});

	$('.table-subheader').click(function(){
		$(this).nextUntil('tr.table-subheader').slideToggle(100);
	});

	// ______________ Horizonatl
	$(document).ready(function() {
      $("a[data-theme]").click(function() {
        $("head link#theme").attr("href", $(this).data("theme"));
        $(this).toggleClass('active').siblings().removeClass('active');
      });

      $("a[data-effect]").click(function() {
        $("head link#effect").attr("href", $(this).data("effect"));
        $(this).toggleClass('active').siblings().removeClass('active');
      });
    });

	// ______________Full screen
	$("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {


        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })

	// ______________Active Class
	$(document).ready(function() {
		$(".horizontalMenu-list li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontal-megamenu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
		$(".horizontalMenu-list .sub-menu .sub-menu li a").each(function() {
			var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});

	// ______________Quantity Cart Increase & Descrease
	$(function () {
		$('.add').on('click',function(){
			var $qty=$(this).closest('div').find('.qty');
			var currentVal = parseInt($qty.val());
			if (!isNaN(currentVal)) {
				$qty.val(currentVal + 1);
			} 
			
		});
		$('.minus').on('click',function(){
			var $qty=$(this).closest('div').find('.qty');
			var currentVal = parseInt($qty.val());
			if (!isNaN(currentVal) && currentVal > 0) {
				$qty.val(currentVal - 1);
			}
		});
	});

	// __________MODAL
	
	// showing modal with effect
	$('.modal-effect').on('click', function(e) {
		e.preventDefault();
		var effect = $(this).attr('data-bs-effect');
		$('#modaldemo8').addClass(effect);
	});
		
	// hide modal with effect
	$('#modaldemo8').on('hidden.bs.modal', function(e) {
		$(this).removeClass(function(index, className) {
			return (className.match(/(^|\s)effect-\S+/g) || []).join(' ');
		});
	});

	// ______________Back to top Button
	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 0);
        return false;
    });

	// ______________ StarRating
	var ratingOptions = {
		selectors: {
			starsSelector: '.rating-stars',
			starSelector: '.rating-star',
			starActiveClass: 'is--active',
			starHoverClass: 'is--hover',
			starNoHoverClass: 'is--no-hover',
			targetFormElementSelector: '.rating-value'
		}
	};
	$(".rating-stars").ratingStars(ratingOptions);

	// ______________ Chart-circle
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: '#e2e2e9',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-transparent').length) {
		$('.chart-circle-transparent').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(0, 0, 0, 0.1)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-primary').length) {
		$('.chart-circle-primary').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(112, 94, 200, 0.4)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-secondary').length) {
		$('.chart-circle-secondary').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(251, 28, 82, 0.4)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-success').length) {
		$('.chart-circle-success').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(66, 196, 138, 0.5)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Chart-circle
	if ($('.chart-circle-warning').length) {
		$('.chart-circle-warning').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: 'rgba(255, 171, 0, 0.5)',
			  lineCap: 'round'
			});
		});
	}

	// ______________ Global Search
	$(document).on("click", "[data-bs-toggle='search']", function(e) {
		var body = $("body");

		if(body.hasClass('search-gone')) {
			body.addClass('search-gone');
			body.removeClass('search-show');
		}else{
			body.removeClass('search-gone');
			body.addClass('search-show');
		}
	});
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);

	$(document).on("click", ".close-btn", function() {
		$("body").removeClass("search-show");
	});

	const DIV_CARD = 'div.card';

	// ______________ Attach Remove
	$(document).on('click', '[data-toggle="remove"]', function(e) {
		let $a = $(this).closest(".attach-supportfiles");
		$a.remove();
		e.preventDefault();
		return false;
	});

	
	// ______________ Tooltip
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
 	 return new bootstrap.Tooltip(tooltipTriggerEl)
	})


	// ______________ Popover
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
	html:
	return new bootstrap.Popover(popoverTriggerEl)
	})
	
	// ______________ Card Remove
	$(document).on('click', '[data-bs-toggle="card-close"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});


	// ______________ Card Remove
	$(document).on('click', '[data-bs-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});

	// ______________ Card Collapse
	$(document).on('click', '[data-bs-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// ______________ Card Fullscreen
	$(document).on('click', '[data-bs-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});

	// sparkline1
	$(".sparkline_bar").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#a1a1a1'
		},
		barColor: '#ff5b51'
	});

	// sparkline2
	$(".sparkline_bar1").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6,], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#c34444'
		},
		barColor: '#44c386'
	});

	// sparkline3
	$(".sparkline_bar2").sparkline([3, 4, 3, 4, 5, 4, 5, 6, 4, 6,], {
		height: 20,
		type: 'bar',
		colorMap: {
			'7': '#a1a1a1'
		},
		barColor: '#fa057a'
	});

	// ______________ SWITCHER-toggle ______________//
	//localStorage.setItem("mytime", "0");
	
	darkMode();
	$('.layout-setting').on("click", function(e) {
		let getLocalStorage = localStorage.getItem("setDarkMode");
		if(getLocalStorage == 1){
			localStorage.setItem("setDarkMode", 0);
		} else if (getLocalStorage == 0){
			localStorage.setItem("setDarkMode", 1);
		} else{
			localStorage.setItem("setDarkMode", 1);
		}
		
		darkMode();
		
	});
	

	  $('.default-menu').on('click', function() {
		var ww = document.body.clientWidth;
		if (ww >= 992) {
			$('body').removeClass('sidenav-toggled');
		}
	});




	// YANMENYU LAYOUT ÜSLUBU START
	/*Closed Sidemenu Start*/
	myOnoffSwitch13();
	$('#myonoffswitch13').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch13");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch13");
		}else{
			localStorage.setItem("myonoffswitch13", 1);
		}
		localStorage.removeItem('myonoffswitch15');
		localStorage.removeItem('myonoffswitch14');
		localStorage.removeItem('myonoffswitch30');

		myOnoffSwitch30();
	});
	/*Closed Sidemenu End*/

	/*Closed Sidemenu Start*/
	myOnoffSwitch30();
	$('#myonoffswitch30').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch30");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch30");
		} else{
			localStorage.setItem("myonoffswitch30", 1);
		}
		localStorage.removeItem('myonoffswitch15');
		localStorage.removeItem('myonoffswitch14');
		localStorage.removeItem('myonoffswitch13');

		myOnoffSwitch30();
    });
	/*Closed Sidemenu End*/

	/*Icon Text Sidemenu Start*/
	myOnoffSwitch14()
	$('#myonoffswitch14').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch14");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch14");
		}else{
			localStorage.setItem("myonoffswitch14", 1);
		}
		localStorage.removeItem('myonoffswitch15');
		localStorage.removeItem('myonoffswitch13');
		localStorage.removeItem('myonoffswitch30');

		myOnoffSwitch14();
    });
	/*Icon Text Sidemenu End*/
	
	/*Default Sidemenu Start*/
	myOnoffSwitch15();
	$('#myonoffswitch15').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch15");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch15");
		}else{
			localStorage.setItem("myonoffswitch15", 1);
		}
		localStorage.removeItem('myonoffswitch14');
		localStorage.removeItem('myonoffswitch30');
		localStorage.removeItem('myonoffswitch13');
		
		myOnoffSwitch15();
	});
	/*Default Sidemenu End*/
	// YANMENYU LAYOUT ÜSLUBU END




	// LAYOUT MÖVQE ÜSLUBU START
	/*Header-Position Styles Start*/
	myOnoffSwitch11();
	$('#myonoffswitch11').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch11");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch11");
		}else{
			localStorage.setItem("myonoffswitch11", 1);
		}
		localStorage.removeItem('myonoffswitch12');
		myOnoffSwitch11();
	});
	/*Header-Position Styles End*/
	/*Header-Position Styles Start*/
	myOnoffSwitch12();
	$('#myonoffswitch12').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch12");
		if(getLocalStorage ){
			localStorage.setItem("myonoffswitch12");
		}else{
			localStorage.setItem("myonoffswitch12", 1);
		}
		localStorage.removeItem('myonoffswitch11');
		myOnoffSwitch12();
	});
	/*Header-Position Styles End*/
	// LAYOUT MÖVQE ÜSLUBU END

	


	// LAYOUT STİLİ START
	/*Boxed Layout Start*/
	myOnoffSwitch9();
	$('#myonoffswitch9').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch9");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch9");
		}else{
			localStorage.setItem("myonoffswitch9", 1);
		}
		localStorage.removeItem('myonoffswitch10');
		myOnoffSwitch9();
	});
	/*Boxed Layout End*/
	/*Boxed Layout Start*/
	myOnoffSwitch10();
	$('#myonoffswitch10').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch10");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch10");
		}else{
			localStorage.setItem("myonoffswitch10", 1);
		}
		localStorage.removeItem('myonoffswitch9');
		myOnoffSwitch10();
	});
	/*Boxed Layout End*/
	// LAYOUT STİLİ END



	// SƏHİFƏNİN ÜST ÜSLUBU START
	/*Gradient Header Start*/
	myOnoffSwitch6();
	$('#myonoffswitch6').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch6");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch6");
		} else{
			localStorage.setItem("myonoffswitch6", 1);
		}
		localStorage.removeItem('myonoffswitch7');
		localStorage.removeItem('myonoffswitch8');
		localStorage.removeItem('myonoffswitch26');
		myOnoffSwitch6();
	});
	/*Gradient Header End*/
	/*Gradient Header Start*/
	myOnoffSwitch7();
	$('#myonoffswitch7').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch7");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch7");
		} else{
			localStorage.setItem("myonoffswitch7", 1);
		}
		localStorage.removeItem('myonoffswitch6');
		localStorage.removeItem('myonoffswitch8');
		localStorage.removeItem('myonoffswitch26');
		myOnoffSwitch7();
	});
	/*Gradient Header End*/
	/*Gradient Header Start*/
	myOnoffSwitch8();
	$('#myonoffswitch8').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch8");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch8");
		}else{
			localStorage.setItem("myonoffswitch8", 1);
		}
		localStorage.removeItem('myonoffswitch6');
		localStorage.removeItem('myonoffswitch7');
		localStorage.removeItem('myonoffswitch26');
		myOnoffSwitch8();
	});
	/*Gradient Header End*/
	/*Gradient Header Start*/
	myOnoffSwitch26();
	$('#myonoffswitch26').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch26");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch26");
		}else{
			localStorage.setItem("myonoffswitch26", 1);
		}
		localStorage.removeItem('myonoffswitch8');
		localStorage.removeItem('myonoffswitch6');
		localStorage.removeItem('myonoffswitch7');
		myOnoffSwitch26();
	});
	/*Gradient Header End*/
	// SƏHİFƏNİN ÜST ÜSLUBU END



	// SOL MENYU ÜSLUBU START
	/*Gradient Menu Start*/
	myOnoffSwitch3();
	$('#myonoffswitch3').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch3");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch3");
		}else{
			localStorage.setItem("myonoffswitch3", 1);
		}
		localStorage.removeItem('myonoffswitch4');
		localStorage.removeItem('myonoffswitch5');
		localStorage.removeItem('myonoffswitch25');
		myOnoffSwitch3();
	});
	/*Gradient Menu End*/
	/*Gradient Menu Start*/
	myOnoffSwitch4();
	$('#myonoffswitch4').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch4");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch4");
		} else{
			localStorage.setItem("myonoffswitch4", 1);
		}
		localStorage.removeItem('myonoffswitch3');
		localStorage.removeItem('myonoffswitch5');
		localStorage.removeItem('myonoffswitch25');
		myOnoffSwitch4();
	});
	/*Gradient Menu End*/
	/*Gradient Menu Start*/
	myOnoffSwitch5();
	$('#myonoffswitch5').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch5");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch5");
		} else{
			localStorage.setItem("myonoffswitch5", 1);
		}
		localStorage.removeItem('myonoffswitch3');
		localStorage.removeItem('myonoffswitch4');
		localStorage.removeItem('myonoffswitch25');
		myOnoffSwitch5();
	});
	/*Gradient Menu End*/
	/*Gradient Menu Start*/
	myOnoffSwitch25();
	$('#myonoffswitch25').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch25");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch25");
		}else{
			localStorage.setItem("myonoffswitch25", 1);
		}
		localStorage.removeItem('myonoffswitch3');
		localStorage.removeItem('myonoffswitch4');
		localStorage.removeItem('myonoffswitch5');
		myOnoffSwitch25();
	});
	/*Gradient Menu End*/
	// SOL MENYU ÜSLUBU END


	// LTR VƏ RTL VERSİYALARI START
	/*LRT Menu Start*/
	myOnoffSwitch54();
	$('#myonoffswitch54').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch54");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch54");
		}else{
			localStorage.setItem("myonoffswitch54", 1);
		}
		localStorage.removeItem('myonoffswitch55');
		myOnoffSwitch54();
	});
	/*LRT Menu End*/
	/*RTL Menu Start*/
	myOnoffSwitch55();
	$('#myonoffswitch55').click(function() {
		let getLocalStorage = localStorage.getItem("myonoffswitch55");
		if(getLocalStorage){
			localStorage.setItem("myonoffswitch55");
		} else{
			localStorage.setItem("myonoffswitch55", 1);
		}
		localStorage.removeItem('myonoffswitch54');
		myOnoffSwitch55();
	});
	/*RTL Menu End*/
	// LTR VƏ RTL VERSİYALARI END

	$(document).ready (function(){
		let bodyRtl = $('body').hasClass('rtl');
		if (bodyRtl) {
				$('body').addClass('rtl');
				$("html[lang=en]").attr("dir", "rtl");
				localStorage.setItem("rtl", "True");
				$("head link#style").attr("href", $(this));
				(document.getElementById("style")?.setAttribute("href", "assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
			} 
			else {
				$('body').removeClass('rtl');
				localStorage.setItem("rtl", "false");
				$("head link#style").attr("href", $(this));
				(document.getElementById("style")?.setAttribute("href", "assets/plugins/bootstrap/css/bootstrap.min.css"));
			};
	});

	
})(jQuery);


function darkMode(){
	let getItem = localStorage.getItem("setDarkMode");
	if(getItem == 1){
		$('body').addClass('dark-mode');
	} else if(getItem == 0) {
		$('body').removeClass('dark-mode');
		$('body').addClass('light-mode');
	}
}

// YANMENYU LAYOUT ÜSLUBU START
function myOnoffSwitch13(){
	let getItem = localStorage.getItem("myonoffswitch13");
	if(getItem == 1){
		$('body').addClass('default-menu');
		$('body').removeClass('closed-menu');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		$('body').removeClass('sidenav-toggled');
		$('#myonoffswitch13').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch30(){
	let getItem = localStorage.getItem("myonoffswitch30");
	if(getItem == 1){
		$('body').addClass('closed-menu');
		$('body').addClass('sidenav-toggled');
		$('body').removeClass('default-menu');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sideicon-menu');
		$('#myonoffswitch30').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch14(){
	let getItem = localStorage.getItem("myonoffswitch14");
	if(getItem == 1){
		$('body').addClass('icontext-menu');
		$('body').addClass('sidenav-toggled');
		$('body').removeClass('default-menu');
		$('body').removeClass('sideicon-menu');
		$('body').removeClass('closed-menu');
		$('#myonoffswitch14').attr('checked', 'checked');
	} else if(getItem == 0){
		$('body').removeClass('icontext-menu');
		$('body').removeClass('sidenav-toggled');
	}
	
}

function myOnoffSwitch15(){
	let getItem = localStorage.getItem("myonoffswitch15");
	if(getItem == 1){
		$('body').addClass('sideicon-menu');
		$('body').addClass('sidenav-toggled');
		$('body').removeClass('default-menu');
		$('body').removeClass('icontext-menu');
		$('body').removeClass('closed-menu');
		$('#myonoffswitch15').attr('checked', 'checked');
	} 
	
}
// YANMENYU LAYOUT ÜSLUBU END



// LAYOUT MÖVQE ÜSLUBU START
function myOnoffSwitch11(){
	let getItem = localStorage.getItem("myonoffswitch11");
	if(getItem == 1){
		$('body').addClass('fixed-layout');
		$('body').removeClass('scrollable-layout');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('color-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('gradient-hormenu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('gradient-menu');
		$('#myonoffswitch11').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch12(){
	let getItem = localStorage.getItem("myonoffswitch12");
	if(getItem == 1){
		$('body').addClass('scrollable-layout');
		$('body').removeClass('fixed-layout');
		$('body').removeClass('color-hormenu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('gradient-hormenu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('gradient-menu');
		$('#myonoffswitch12').attr('checked', 'checked');
	} 
	
}
// LAYOUT MÖVQE ÜSLUBU END



// LAYOUT STİLİ START
function myOnoffSwitch9(){
	let getItem = localStorage.getItem("myonoffswitch9");
	if(getItem == 1){
		$('body').addClass('layout-fullwidth');
		$('body').removeClass('layout-boxed');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('color-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('gradient-hormenu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('gradient-menu');
		$('#myonoffswitch9').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch10(){
	let getItem = localStorage.getItem("myonoffswitch10");
	if(getItem == 1){
		$('body').addClass('layout-boxed');
		$('body').removeClass('layout-fullwidth');
		$('body').removeClass('color-hormenu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('gradient-hormenu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('gradient-menu');
		$('#myonoffswitch10').attr('checked', 'checked');
	} 
	
}
// LAYOUT STİLİ END



// SƏHİFƏNİN ÜST ÜSLUBU START
function myOnoffSwitch6(){
	let getItem = localStorage.getItem("myonoffswitch6");
	if(getItem == 1){
		$('body').addClass('light-header');
		$('body').removeClass('color-header');
		$('body').removeClass('dark-header');
		$('body').removeClass('gradient-header');
		$('#myonoffswitch6').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch7(){
	let getItem = localStorage.getItem("myonoffswitch7");
	if(getItem == 1){
		$('body').addClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('dark-header');
		$('body').removeClass('gradient-header');
		$('#myonoffswitch7').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch8(){
	let getItem = localStorage.getItem("myonoffswitch8");
	if(getItem == 1){
		$('body').addClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('body').removeClass('gradient-header');
		$('#myonoffswitch8').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch26(){
	let getItem = localStorage.getItem("myonoffswitch26");
	if(getItem == 1){
		$('body').addClass('gradient-header');
		$('body').removeClass('dark-header');
		$('body').removeClass('color-header');
		$('body').removeClass('light-header');
		$('#myonoffswitch26').attr('checked', 'checked');
	} 
	
}
// SƏHİFƏNİN ÜST ÜSLUBU END



// SOL MENYU ÜSLUBU START
function myOnoffSwitch3(){
	let getItem = localStorage.getItem("myonoffswitch3");
	if(getItem == 1){
		$('body').addClass('light-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('color-hormenu');
		$('#myonoffswitch3').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch4(){
	let getItem = localStorage.getItem("myonoffswitch4");
	if(getItem == 1){
		$('body').addClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('color-hormenu');
		$('#myonoffswitch4').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch5(){
	let getItem = localStorage.getItem("myonoffswitch5");
	if(getItem == 1){
		$('body').addClass('dark-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('gradient-menu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('dark-hormenu');
		$('#myonoffswitch5').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch25(){
	let getItem = localStorage.getItem("myonoffswitch25");
	if(getItem == 1){
		$('body').addClass('gradient-menu');
		$('body').removeClass('color-menu');
		$('body').removeClass('light-menu');
		$('body').removeClass('dark-menu');
		$('body').removeClass('light-hormenu');
		$('body').removeClass('dark-hormenu');
		$('body').removeClass('dark-hormenu');
		$('#myonoffswitch25').attr('checked', 'checked');
	} 
	
}
// SOL MENYU ÜSLUBU END



// LTR VƏ RTL VERSİYALARI START
function myOnoffSwitch54(){
	let getItem = localStorage.getItem("myonoffswitch54");
	if(getItem == 1){
		$('body').addClass('ltr');
		$('body').removeClass('rtl');
		$("html[lang=en]").attr("dir", "ltr");
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
		var carousel = $('.owl-carousel');
		$.each(carousel ,function( index, element)  {
			// element == this
			var carouselData = $(element).data('owl.carousel');
			carouselData.settings.rtl = false; //don't know if both are necessary
			carouselData.options.rtl = false;
			$(element).trigger('refresh.owl.carousel');
		});
		$('#myonoffswitch54').attr('checked', 'checked');
	} 
	
}

function myOnoffSwitch55(){
	let getItem = localStorage.getItem("myonoffswitch55");
	if(getItem == 1){
		$('body').addClass('rtl');
		$('body').removeClass('ltr');
		$("html[lang=en]").attr("dir", "rtl");
		$("head link#style").attr("href", $(this));
		(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));

		var carousel = $('.owl-carousel');
			$.each(carousel ,function( index, element)  {
			// element == this
			var carouselData = $(element).data('owl.carousel');
			carouselData.settings.rtl = true; //don't know if both are necessary
			carouselData.options.rtl = true;
			$(element).trigger('refresh.owl.carousel');
		});
		$('#myonoffswitch55').attr('checked', 'checked');
	} 
	
}
// LTR VƏ RTL VERSİYALARI END




