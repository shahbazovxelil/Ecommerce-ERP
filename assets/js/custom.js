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

	$(".open-toggle").trigger("click");
	

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



	  $('.default-menu').on('click', function() {
		var ww = document.body.clientWidth;
		if (ww >= 992) {
			$('body').removeClass('sidenav-toggled');
		}
	});


	/*Theme-layout*/

	/*Light Layout Start*/
    	// $('body').addClass('light-mode');
	/*Light Layout End*/

	/*Dark Layout Start*/
    	// $('body').addClass('dark-mode');
	/*Dark Layout End*/

	/*Light Menu Start*/
    	// $('body').addClass('light-menu');
	/*Light Menu End*/

    /*Color Menu Start*/
   		// $('body').addClass('color-menu');
	/*Color Menu End*/

    /*Dark Menu Start*/
    	// $('body').addClass('dark-menu');
	/*Dark Menu End*/

	/*Gradient Menu Start*/
    	// $('body').addClass('gradient-menu');
	/*Gradient Menu End*/

	/*Light Header Start*/
    	// $('body').addClass('light-header');
	/*Light Header End*/

	/*Color Header Start*/
   		// $('body').addClass('color-header');
	/*Color Header End*/

	/*Dark Header Start*/
		// $('body').addClass('dark-header');
	/*Dark Header End*/

	/*Gradient Header Start*/
		// $('body').addClass('gradient-header');
	/*Gradient Header End*/

	/*Full Width Layout Start*/
		// $('body').addClass('layout-fullwidth');
	/*Full Width Layout End*/

	/*Boxed Layout Start*/
		// $('body').addClass('layout-boxed');
	/*Boxed Layout End*/



	/*Header-Position Styles Start*/

		/*Fixed Layout Start*/
			// $('body').addClass('fixed-layout');
		/*Fixed Layout End*/	

		/*Scrollable Layout Start*/
			// $('body').addClass('scrollable-layout');
		/*Scrollable Layout End*/

	/*Header-Position Styles End*/

	
	/*Default Sidemenu Start*/
		// $('body').addClass('default-menu');
	/*Default Sidemenu End*/

	
	/*Closed Sidemenu Start*/
		// $('body').addClass('closed-menu');
		// $('body').addClass('sidenav-toggled');
	/*Closed Sidemenu End*/

	
	/*Icon Text Sidemenu Start*/
		// $('body').addClass('icontext-menu');
		// icontext();
		// $('body').addClass('sidenav-toggled');
	/*Icon Text Sidemenu End*/

	
	



	/*Horizontal Style*/

		/*Light Hormenu Start*/
			// $('body').addClass('light-hormenu');
		/*Light Hormenu End*/

		/*Color Hormenu Start*/
			// $('body').addClass('color-hormenu');
		/*Color Hormenu End*/

		/*Dark Hormenu Start*/
			// $('body').addClass('dark-hormenu');
		/*Dark Hormenu End*/

		/*Gradient Hormenu Start*/
			// $('body').addClass('gradient-hormenu');
		/*Gradient Hormenu End*/

	/*Horizontal Style*/

	/*RTL Layout Style*/
		// $('body').addClass('rtl');
	/*RTL Layout Style End*/


		$(document).ready (function(){
			let bodyRtl = $('body').hasClass('rtl');
			if (bodyRtl) {
					$('body').addClass('rtl');
					$("html[lang=en]").attr("dir", "rtl");
					localStorage.setItem("rtl", "True");
					$("head link#style").attr("href", $(this));
					(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
				} 
				else {
					$('body').removeClass('rtl');
					localStorage.setItem("rtl", "false");
					$("head link#style").attr("href", $(this));
					(document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
				};
		});

})(jQuery);


