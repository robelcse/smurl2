(function ($) {
	"use strict";


	/********************************
	  |*********Preloader*******|
	*******************************/
	$(window).on('load', function () {
		$('.loader').fadeOut();
		$('.pre-loader').delay(350).fadeOut();
	});


	/********************************
	  |*********Remove Fix Nav*******|
	*******************************/

	jQuery(document).ready(function ($) {

		$('button.navbar-toggler').on('click', function () {
			$('.navbar-collapse').slideToggle('slow');
		});

		$('.hirevisa-nav nav ul li.has-child').after().click(function () {
			$(this).find("ul").toggleClass("nav_active");
		});

		/********************************
		  |*********Logo Slider*******|
		*******************************/
		$('.logoSlider').owlCarousel({
			loop: true,
			margin: 30,
			nav: false,
			dots: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			autoplay: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 3
				},
				1000: {
					items: 5
				}
			}
		})

		/********************************
		  |*********Testimonial Slider*******|
		*******************************/
		$('.testimonial-slider').owlCarousel({
			loop: true,
			nav: false,
			dots: true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			autoplay: true,
			items: 1,
		})
	});


	/********************************
	  |*********Show Hide Navigation While Scroll*******|
	*******************************/

	ScrollNav();

	$(window).scroll(function () {
		ScrollNav();
	});
	function ScrollNav() {
		if ($(window).scrollTop() > 50) {

			$(".site-header").addClass("scrolling  navbar-fixed-top");

			//scroll to top
			$(".button-scroll").fadeIn();

		} else {
			$(".site-header").removeClass("scrolling");

			//scroll to top
			$(".button-scroll").fadeOut();
		}
	}


	/********************************
	  |*********Smooth Scroll*******|
	*******************************/
	$(".button-scroll").click(function (e) {
		e.preventDefault();

		var section_id = $(this).attr("href");

		$("html, body").animate({
			scrollTop: $(section_id).offset().top - 97
		}, 1000);
	});



	/********************************
	  |*********Hash Link Scroll*******|
	*******************************/

	var $siteRoot = $('html, body');
	$('a[href^="#"]').click(function () {
		$siteRoot.animate({
			scrollTop: $($.attr(this, 'href')).offset().top - 72
		}, 500);

		return false;
	});

	$('.cookie-btn').click(function () {
		$('.cookie-area').fadeOut('slow');
	});

	function copyShortUrl() {
		navigator.clipboard.writeText(document.querySelector('#long_url').value)
			.then(() => {
				$('#shortnarBtn').html("Copied")
				$('#shortnarBtn').css('background-color', 'green')
				setTimeout(() => {
					$('#shortnarBtn').html("Copy")
					$('#shortnarBtn').css('background-color', '#6f42eb')
				}, 1000)
				$("#long_url").select();
			})
			.catch(() => {
				alert('Failed to copy text.')
			})
	}


	$('.copyTOclipboard').on('click', function(){
		var element = $(this).closest('span').prev('span')[0];
		var selection = window.getSelection();
		var range = document.createRange();
		range.selectNodeContents(element);
		selection.removeAllRanges();
		selection.addRange(range);
		try {
			 document.execCommand('copy');
			console.log('A Shoto Link Copied Successfully');
		} catch (err) {
			console.log(err);
		}
	});

	
	$("#long_url").click((e) => {
		$("#long_url").select();
	})
	
	$("#long_url").keyup((e) => {
		if ($("#shortnarBtn").hasClass("copy")) {
			shortnarBtn.classList.remove("copy");
			shortnarBtn.innerHTML = "Shorten"
		}
	})
	function formValidation() {
		var url = $("#long_url").val()
		var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
		if (pattern.test(url)) {
			return true;
		}
		if (url.trim() == "") {
			alert('Whoops! Seems you forgot to enter a link.');
		} else if(url.includes('pikly.xyz')){
			alert('Whoops! Seems you entered a pikly link.');
		}else {
			alert("Ow no! I could not shorten it for you. Seems it is not a valid url.");
		}
		return false;
	}

	$('#shortnarBtn').click((e) => {
		e.preventDefault();
		if ($("#shortnarBtn").hasClass("copy")) {
			if ($("#long_url").val())
				copyShortUrl()
		} else {
			if (formValidation())
				$('#shortnarForm').submit()
		}
	})

	setTimeout(function() {
		$('.toaster').hide('fast');
	}, 3000); 
	
}(jQuery));	