var map = null;
var similar_events_list = [];
var packageRadioValue = '';
var selected_therapy = '';
var selected_ailment = '';

if ($(window).width() < 700){
	var therapiest_showChar = 32;
} else{
	var therapiest_showChar = 80;
}
if ($(window).width() < 700){
	var testimonail_showChar = 95;
} else{
	var testimonail_showChar = 143;
}
  // How many characters are shown by default
var therapiest_ellipsestext = "...";
var therapiest_moretext = "read more";
var therapiest_lesstext = "read less";
var int_number = "";
 
 function updateQueryStringParameter(uri, key, value) {
		var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
	  	var separator = uri.indexOf('?') !== -1 ? "&" : "?";
	  	if (uri.match(re)) {
	    	return uri.replace(re, '$1' + key + "=" + value + '$2');
	  	}
	  	else {
	   		return uri + separator + key + "=" + value;
	  	}
	}

$(document).ready(function(){
	moveBackground();

	$("#review_text").on('blur', function(e) {
        var reg =/<(.|\n)*?>/g; 
        if (reg.test($('#review_text').val()) == true) {
            alert('HTML Tag are not allowed');
        }
        e.preventDefault();
    });

	$('#qw_form').on("submit", function(event){  
		event.preventDefault();  
	  	if($('#password').val() != $('#c_password').val()){  
	   		$('#qsmsg').html("Your password and confirm password doesnot match.");  
	  	} else {  
	   		$.ajax({  
		    	url: ajax_object.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'saveUsertoQSNT'},  
		    	success:function(data){  
		     		var msg = JSON.parse(data);
		     		$('#qsmsg').html(msg.qsmsg);
		     		window.open('https://qsserver.com/', '_blank');
		    	}  
	   		});  
  		} 
  	}); 

	$("#openlocationbox").click(function(){
	    $("#locationsearch").toggle();
	});
	
	$("#openlocationbox_mobile").click(function(){
	    $("#locationsearch").toggle();
	});

	$('#apply_filter_therapist').click(function(){
		var txtArea = $('#txtArea').val();
		var url = window.location.href;
		if(txtArea != ""){
			$.ajax({
			   	url: ajax_object.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'save_area_session', 'area': txtArea},
			   	success: function (data) 
			   	{
			  //  		var obj = JSON.parse(data);
			  //  		param = updateQueryStringParameter(url, 'area', obj.area);
					// param += "&latitude="+obj.lat+"&longitude="+obj.lng;
					//window.location.href = param;
					// $('#filter-therapist').attr('action', param);
			   		$('#filter-therapist').submit();
			   	},
			   	complete: function (data) {},
			   	error: function (err) {}
			});
		} else {
			$('#filter-therapist').submit();
		}
	});
	
 $('ul.step-list li').on("click", function() {
	 //changeCurrentStage($(this).text());
	 
	 //If therapist edit his/her profile
	 var gerParam = window.location.search.substring(1);
	 if(gerParam)
	 {
		 var isEdit = window.location.search.substring(1).split('=')[1];
		 if(isEdit && $.isNumeric(isEdit))
		 {
			 setCurrentStage($(this).text());
		 }
	 }
	 //End
});


$(".fliter-link").click(function(event){
	$(this).animate({opacity: '0'},500);
	$(".filter-wrapper").css({"z-index":"9","display":"block",}).animate({opacity: '1',left:0,display:"block"},1000);
	event.preventDefault(); 
});

	$(".fliter-link").click(function (event) {
		$(this).animate({
			opacity: '0'
		}, 500);
		$(".filter-wrapper").css({
			"z-index": "9",
			"display": "block",
		}).animate({
			opacity: '1',
			left: 0,
			display: "block"
		}, 1000);
		event.preventDefault();
	});

	$(".close-action").click(function (event) {
		event.preventDefault();
		$(this).parents(".filter-wrapper").animate({
			opacity: '0',
			left: 0,
			display: "none"
		}, 500).css({
			"z-index": "-9",
			"display": "none",
		});
		$(".fliter-link").animate({
			opacity: '1'
		}, 1000);
		event.preventDefault();
	});
	$(".remove-tab").click(function () {
		$(this).parents(".filter-tag").hide();
	});


	var swiper = new Swiper('.swiper-home-blog', {
		slidesPerView: 4,
		spaceBetween: 30,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			640: {
				slidesPerView: 'auto',
				spaceBetween: 10
			}
		}
	});

	var testimonial_swiper = new Swiper('.swiper-testimonial', {
		slidesPerView: 1,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		}
	});

	if ($(window).width() < 700) {

	$(".footer-menu-item h2").click(function () {
		console.log("clicked");
		var spanElm = $(this).find("span")
		if (spanElm.hasClass("fa fa-minus-square")) {
			spanElm.removeClass("fa fa-minus-square");
			spanElm.addClass("fa fa-plus-square");
		} else {
			spanElm.removeClass("fa fa-plus-square");
			spanElm.addClass("fa fa-minus-square");
		}
		$(this).next().toggle();
	});
	}

	var swiper = new Swiper('.therapy-detail-review-section .swiper-container', {
		autoHeight: true,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,

		},
/*
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
*/
	});

	var swiper = new Swiper('.blog-list-icon', {
		slidesPerView: 3,
		spaceBetween: 0,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	var swiper2 = new Swiper('.certificate_slider', {
		slidesPerView: 2,
		spaceBetween: 30,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

	});
	var swiper3 = new Swiper('.gallery_slider', {
		slidesPerView: 2,
		spaceBetween: 30,
		centeredSlides: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

	});


	var swiper_event_single = new Swiper('.single-banner-top', {
		autoplay: {
			delay: 5000,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,

		},
	});

	$('.detail-menu-top li a').on('click', function () {
		var $el = $(this),
			id = $el.attr('href');
		console.log(id);
		$('.detail-menu-top').find('li a').removeClass('active');
		$el.addClass("active");
		$('html, body').animate({
			scrollTop: $(id).offset().top - 80
		}, 2000);
		return false;
	});


 
$(".google-link-wrapper").on("click",function(e){
	e.preventDefault();
	$(".theChampGoogleLogin").click();
}); 
 
 
 	
	$('.excerpt-content-rm a.eclip-more-link').click(function(e) {
	 e.preventDefault();
     	$(this).closest('.abt-more').find('.readmore-content-wrapper').show();
	 	$('.excerpt-content-rm').hide()
	 	return false;
  	});
  	
  	$('.readmore-content-wrapper a.eclip-more-link').click(function(e) {
	 e.preventDefault();
     	$(this).closest('.abt-more').find('.excerpt-content-rm').show();
	 	$('.readmore-content-wrapper').hide()
	 	return false;
  	});
  	
  	
  	$('.more').each(function() {
        var content = $(this).html();
		
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
 
 

 
 show_more_tharapiest();
//  if ($(window).width() < 700){
// 	therapiest_showChar = 20;
// }

/*
var sticky = new Waypoint.Sticky({
    element: $('.therapist-listing-sidebar-content')[0],
    offset: '30%'
});


$('.malinky-ajax-pagination-loading').waypoint(function(direction) {
	console.log(direction);
	if(direction === 'up'){
		$('.therapist-listing-sidebar-content').addClass('sticky-surpassed');
		$('.therapist-listing-sidebar-content').removeClass('stuck');
	}else if(direction === 'down'){
		$('.therapist-listing-sidebar-content').addClass('stuck');
		$('.therapist-listing-sidebar-content').removeClass('sticky-surpassed');
	}
  }, {
  offset: function() {
      return $('.therapist-listing-sidebar-content').outerHeight()+30;
  }
});
*/




 
	 


 

$(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    }); 
 
jQuery('body').on("click",".menu",function () {
        jQuery(this).toggleClass('open');
        jQuery('.mobile-menu-wrapper').toggleClass('open-menu');
    });

/*
$(".share-cta").click(function(e){
	$(this).next(".thriive-social-block").toggleClass("show-block");
	e.preventDefault();
})
*/

	var showChar = 100; // How many characters are shown by default
	var ellipsestext = "...";
	var moretext = "read more";
	var lesstext = "read less";


$(".connect_with_btn, .communication-mode a").on("click",function(e){
	e.preventDefault();
	$("#connect_with_healer").modal('show'); 
});

// New Design
jQuery(".connect_with_btn_listing").on("click",function(e)
{
	e.preventDefault();
	var $this = $(this);
	var post_id = $this.attr("data-id");
	$('.ajax-loader').show();
	setTimeout(function(){
		$.ajax({
	       	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'getTherapistCommunicationMode', 'post_id': post_id},
		   	success: function (data) 
		   	{
	        	//console.log("Result: \n" + data);
	        	$('input[name="postId"]').val(post_id);
	        	$('#communication_mode').html(data);
	        	$('#connect_with_healer').modal('show');
	       	},
		   	complete: function (data) {
		   		$(".ajax-loader").hide();
		   	},
		   	error: function (err) {
		   		$(".ajax-loader").hide();
		   	}
	   	});
   	},100);
});
// New Design


	$(".facebook-link-wrapper").on("click", function (e) {
		e.preventDefault();
		$(".theChampFacebookLogin").click();
	});


	$(".google-link-wrapper").on("click", function (e) {
		e.preventDefault();
		$(".theChampGoogleLogin").click();
	});



	$('.excerpt-content-rm a.eclip-more-link').click(function (e) {
		e.preventDefault();
		$(this).closest('.abt-more').find('.readmore-content-wrapper').show();
		$('.excerpt-content-rm').hide()
		return false;
	});

	$('.readmore-content-wrapper a.eclip-more-link').click(function (e) {
		e.preventDefault();
		$(this).closest('.abt-more').find('.excerpt-content-rm').show();
		$('.readmore-content-wrapper').hide()
		return false;
	});


	$('.more').each(function () {
		var content = $(this).html();

		if (content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});


	if ($(window).width() < 700) {





	}
	$(".morelink").click(function () {
		if ($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});


	$(".share-cta").click(function (e) {
		$(this).next(".thriive-social-block").toggleClass("show-block");
		e.preventDefault();
	})

	$('#therapy-list').select2();
	$('#select-list-item').select2();
	$('.select-dropdown-list').select2();

	$(".connect_with_btn, .communication-mode a").on("click", function (e) {
		e.preventDefault();
		$("#connect_with_healer").modal('show');
	})

	show_more_tharapiest();
	// if ($(window).width() < 700) {
	// 	therapiest_showChar = 20;
	// }

	if ($('.about-us').find(".aboutus-anchore").length > 0) {
		$('a[href^="#"]').click(function (event) {
			$('.aboutus-anchore a').removeClass('active');
			$(this).addClass('active');
			var id = $(this).attr("href");
			var offset = 60;
			var target = $(id).offset().top - offset;
			$('html, body').animate({
				scrollTop: target
			}, 2500);
			event.preventDefault();
		});
	}

	var tradingEventsSlider = new Swiper('.trading-events-slider', {
		slidesPerView: 2,
		spaceBetween: 30,
		centeredSlides: false,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			767: {
				slidesPerView: 1,
				spaceBetween: 0
			},
		}
	});

	if (window.location.pathname == '/event') {
		filter_event();
	}

	var gallery_image_slider = new Swiper('.gallery-image-slider', {
		slidesPerView: 2,
		spaceBetween: 15,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});

	var gallery_video_slider = new Swiper('.gallery-video-slider', {
		slidesPerView: 2,
		spaceBetween: 15,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});


	$('.gallery-image-slider .swiper-slide').on('click', function () {
		var slideId = $(this).attr('id');
		openFullscreenSwiper(slideId);

	});

	function openFullscreenSwiper(initialSlideNumber) {
		var mainSwiperMarkup = $('.gallery-image-slider').html();

		$('#fullscreen-swiper').append(mainSwiperMarkup + "<div id='fullscreen-swiper-close'>X</div>").fadeIn();

		var fullscreenSwiper = new Swiper('#fullscreen-swiper', {
			pagination: '.swiper-pagination',
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			slidesPerView: 1,
			centeredSlides: true,
			paginationClickable: true,
			spaceBetween: 15,
			initialSlide: initialSlideNumber - 1,
		});

		$('#fullscreen-swiper-backdrop').fadeIn();

		$('body, html').addClass('no-scroll');

		$('#fullscreen-swiper-close').on('click', function (e) {
			$('#fullscreen-swiper').hide().empty();
			$('#fullscreen-swiper-backdrop').fadeOut();
			$('body, html').removeClass('no-scroll');
		});

	}


	$('.event-location').each(function () {

		// create map
		map = new_map($(this));

	});

	// Therapy, Experience, Charges Validation on therapy registration
	$('.therapy-list').on('change', '.add_therapy_section .sel .therapy-select', function () {
		var select_value = this.value;
		if (select_value != '') {
			$(this).parents('.add_therapy_section').find('.exp .therapy-exp').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Experience is required.');
			$(this).parents('.add_therapy_section').find('.chg .therapy-chg').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Charges is required.');
		} else {
			$(this).parents('.add_therapy_section').find('.exp .therapy-exp').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
			$(this).parents('.add_therapy_section').find('.chg .therapy-chg').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
		}
	});

	$('.therapy-list').on('change', '.add_therapy_section .exp .therapy-exp', function () {
		var input_value = this.value;
		if (input_value != '') {
			$(this).parents('.add_therapy_section').find('.sel .therapy-select').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Therapy is required.');
			$(this).parents('.add_therapy_section').find('.chg .therapy-chg').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Charges is required.');
		} else {
			$(this).parents('.add_therapy_section').find('.sel .therapy-select').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
			$(this).parents('.add_therapy_section').find('.chg .therapy-chg').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
		}
	});

	$('.therapy-list').on('change', '.add_therapy_section .chg .therapy-chg', function () {
		var select_value = this.value;
		if (select_value != '') {
			$(this).parents('.add_therapy_section').find('.exp .therapy-exp').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Experience is required.');
			$(this).parents('.add_therapy_section').find('.sel .therapy-select').attr('required', true);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('Therapy is required.');
		} else {
			$(this).parents('.add_therapy_section').find('.exp .therapy-exp').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
			$(this).parents('.add_therapy_section').find('.sel .therapy-select').attr('required', false);
			$(this).parents('.add_therapy_section').find('.parsley-errors-list li').html('');
		}
	});
	$('.therapy-chg').focusout(function(){
	  if ($(this).val() < 100){
	    jQuery('#chg_error').html('Charges should be greater than 100.');
	  } else {
	  	jQuery('#chg_error').html('');
	  }
	});

	// Change State Dynamically on Country Change Therapist Registration
	jQuery('.regsiter-form-section #country').on('change', function () {
		var countryID = $('option:selected', this).attr('country_id');
		countryState('register', countryID);
	});

	// Change State Dynamically on Country Change Create Event
	jQuery('#create_event #country').on('change', function () {
		var countryID = $('option:selected', this).attr('country_id');
		countryState('event', countryID);
	});

	// Change City Dynamically on State Change Therapist Registration
	jQuery('.regsiter-form-section #state').on('change', function () {
		var stateID = $('option:selected', this).attr('state_id');
		stateCity('register', stateID);
	});

	// Change City Dynamically on State Change Create Event
	jQuery('#create_event #state').on('change', function () {
		var stateID = $('option:selected', this).attr('state_id');
		stateCity('event', stateID);
	});

	jQuery(".container").on('click', '.load-more-data', function (e) {
		e.preventDefault();
		var url = window.location.href;
		var splitUrl = new Array();
		var splitUrl = url.split('?');
		if (splitUrl[1] != undefined) {
			var splitpart2 = '?' + splitUrl[1];
		} else {
			splitpart2 = '';
		}
		var link = jQuery(this).attr('href');
		var $this = jQuery(this);
		jQuery(this).text('Loading...');
		jQuery(this).addClass('disabled');
		var next_page_view = jQuery(this).attr('data-next-page-view');
		var per_page_view = jQuery(this).attr('data-current-page-view');
		var page_title = jQuery(this).attr('data-page-title');
		var next_page = parseInt(next_page_view) /* +parseInt(per_page_view) */ ;
		//console.log("Next page: " + next_page);
		//jQuery(".load-more-data").attr("href", "");
		//jQuery(".load-more-data").attr("href", splitUrl[0]+'/page/'+next_page+splitpart2);
		var range = parseInt(jQuery(this).attr('data-total-page'));
		if (next_page <= range) {
			//$this.attr('data-next-page-view',next_page);
			jQuery.ajax({
					url: "./page/" + next_page,
					data: {
						page: next_page,
						url: window.location.pathname.toString()
					}
				})
				.done(function (response) {
					var cloanElm = jQuery('.section-loop-wrapper').children().clone().attr('class');
					cloanElm = cloanElm.replace('section', '');
					jQuery('.section-loop-wrapper').append(jQuery('<div class="' + cloanElm + '">').load(link + ' .section-wrapper-listing', function () {
						jQuery('.therapiest_list').fadeIn(500);
						$this.text('LOAD MORE ' + page_title + '');
						$this.removeClass('disabled');
						next_page++;
						$this.attr('data-next-page-view', next_page);
						jQuery(".load-more-data").attr("href", "");
						jQuery(".load-more-data").attr("href", splitUrl[0] + '/page/' + next_page + splitpart2);
						if (next_page > range) {
							//jQuery('.load-more-data').hide();
							jQuery('.load-more-data').remove();
						}
					}));;
				})
				.fail(function () {
					console.log("error");
				});

		}

	});

	$(".event-book-now").click(function () {
		//passing name name through data paramiter
		var event_name = $(this).data('link');

		//sending click event with CTA action and event name (Thriive event)

		gtag('event', 'view_item', {
			event_category: 'Event Detail CTA',
			event_label: event_name,
		});

		//ga('send', 'event', 'Event detail CTA', 'click', event_name);
	});


	//Home page widget gtag action
	$(".slider-home .swiper-container .swiper-slide a").on("click", function (e) {
		// event.preventDefault();

		var widget_event_cat = $(this).parents(".slider-home").find("h3").text();
		var widget_event_label = $(this).parents(".swiper-slide").find("h5 a").text();
		var widget_event_action = "Click";
		var widget_event_value = $(this).attr('href');

		gtag('event', 'view_item', {
			'event_category': widget_event_cat,
			'event_label': widget_event_label,
			'event_action': widget_event_action,
			'event_value': widget_event_value
		});

	});

	function badge_create() {
		html2canvas(document.querySelector(".badge_view_wrapper"), {
			scale: 2
		}).then(canvas => {
			//$(".badge_wrapper_download").append(canvas);
			// $(".badge_wrapper").hide();	    
			// document.body.appendChild(canvas);
			theCanvas = canvas;
			var dataURL = canvas.toDataURL("image/png");
			$(".badge-btn").attr("href", dataURL);
			$(".badge-btn").html('<i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD BADGE');
		});
	}

	$(".create_badge").click(function () {
		$("#show_badge").modal('show');
		$(".badge-btn").html("Loading...");
		setTimeout(function () {
			badge_create();
		}, 2000)
	});

	$(".delete_user").click(function(){
		$("#delete_user_popup").modal('show');
	});

	$(".request_popup").click(function(){
		$("#request_popup").modal('show');
	});

	/*
		if(document.querySelector('.badge_view_wrapper') !== null){
			badge_create();
		}
	*/
	// subscibe gravity forms
	jQuery(document).bind('gform_confirmation_loaded', function (event, formId) {
		if (formId == 2) {
			gtag('event', 'Clicked', {
				'event_category': 'stickysubscription'
			});
		}
		setTimeout(function () {
			$(".subscribe_footer").hide();
		}, 10000);
	});

	$(".subscribe_footer").on("click", ".close-btn", function () {
		$(this).parents('.subscribe_footer').hide();
		console.log();
	});

	jQuery(".filter-therapist").submit(function (e) {
		var sel1 = jQuery("#sel1 option:selected").val();
		var sel2 = jQuery("#sel2 option:selected").val();
		var sel5 = jQuery("#sel5 option:selected").val();
		// jQuery(".filter-therapist #sel1").attr("disabled", "disabled");
		// jQuery(".filter-therapist #sel2").attr("disabled", "disabled");
		// jQuery(".filter-therapist #sel5").attr("disabled", "disabled");

		if (sel1 == '') {
			jQuery("#sel1").attr("disabled", "disabled");
		}
		if (sel2 == '') {
			jQuery("#sel2").attr("disabled", "disabled");
		}
		if (sel5 == '') {
			jQuery("#sel5").attr("disabled", "disabled");
		}
	});

	$('#getlocation').click(function(e){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	});

	function showPosition(position) {
		$("#menu_geolocation").text('Updating..');
		var latitude = position.coords.latitude
		var longitude = position.coords.longitude;
		console.log(latitude,longitude);
		var d = new Date();
		var user_date = d.getDate() + '/' + (d.getMonth('') + 1) + '/' + d.getFullYear();
		var user_time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
		var url = window.location.href;

		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'UsersGeoLocation',
				'latitude': latitude,
				'longitude': longitude,
				'user_date': user_date,
				'user_time': user_time
			},
			success: function (data) {
				$("#menu_geolocation").text(data);
				$("#txtArea").val(data);
				param = updateQueryStringParameter(url, 'area', data);
				//param += "&latitude="+latitude+"&longitude="+longitude;
				window.location.href = param;
			},
			complete: function (data) {},
			error: function (err) {
				console.log("Error\n" + err);
			}
		});
	}

/*
	$(".user_name_top").hover(function () {
		$(".user-sub-action-wrapper").show();
	}, function () {
		$(".user-sub-action-wrapper").hide();
	});
*/	

	if ($(window).width() < 700) {
		$(".user-loggedin a.link_profile").click(function (e) {
			e.preventDefault();
			$(".user-sub-action-wrapper").toggleClass("active");
		});
	}else{
		$(".user-loggedin a.link_profile").click(function (e) {
			e.preventDefault();
		});
		$(".user-loggedin").hover(function () {
			$(".user-sub-action-wrapper").show();
		}, function () {
			$(".user-sub-action-wrapper").hide();
		});
	}


	// Filter Ailments after selecting Therapist on Therapist Page
	$('.therapist-search-form .filter-therapist #sel1').change(function (e) {
		selected_therapy = this.value;
		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'getAilmentByTherapy',
				'therapySlug': this.value
			},
			beforeSend: function () {
				$('.therapist-search-form .filter-therapist .all_ailments .loader').show();
			},
			success: function (response) {
				$('.therapist-search-form .filter-therapist .all_ailments .loader').hide();
				var html = '';
				var ail = jQuery('.therapist-search-form .filter-therapist #sel5');
				if (response == 'empty') {
					ail.html('');
					html += '<option value="">No Issue available</option>';
				} else {
					var data = JSON.parse(response);
					html = '<option value="">Search Issue</option>';
					jQuery.each(data, function (k, v) {
						html += '<option value="' + v['slug'] + '">' + v['name'] + '</option>';
					});
				}
				ail.html(html);
				jQuery('.therapist-search-form .filter-therapist #sel5').val(selected_ailment);
			},
			error: function (err) {
				console.log(err);
			}
		});
	});

	$(document).on("change","#package_details .therapy-list .add_therapy_section .sel select",function(e){
	//$('#package_details .therapy-list .add_therapy_section .sel select').on('change', function (e) {
		var select_id = $(this).attr("id");
		var id = select_id.split("_");
		//var selected_therapy = $('#'+select_id).find(':selected').data('slug');
		$.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'getAilmentByTherapy'
				//'therapySlug': selected_therapy
			},
			beforeSend: function () {
				$('.add_therapy_section .all_ailments #loader_'+id[1]).show();
			},
			success: function (response) {
				$('.add_therapy_section .all_ailments #loader_'+id[1]).hide();
				var html = '';
				var ail = $('.add_therapy_section .all_ailments #sel_issue_'+id[1]);
				if (response == 'empty') {
					ail.html('');
					html += 'No Issue available';
				} else {
					ail.html('');
					var data = JSON.parse(response);
					html = '<label for="issue-'+id[1]+'" class="d-block">Select top 3 issues you specialize to match with right users.<br/>(ex: migraine, backpain)</label>';
					html += '<div id="selected_issues_'+id[1]+'" class="selected_issues"></div>';
					html += '<div class="issue_box" style="overflow: scroll; border: 1px solid #000; height: 200px;">';
					html += '<div style="margin-bottom: 5px;"><input type="text" class="form-control search_issues" id="search_issues_'+id[1]+'" placeholder="Search Issues" style="border-color: #c6c6c6 !important;"></div>';
					$.each(data, function (k, v) {
						var name = v['name'].replace("'","*");
						if(k == 0){
							html += "<div class='row therapy_issues' style='padding: 0 5%;'><div class='col-md-2 col-xs-2'><input type='checkbox' name='issues_"+id[1]+"[]' id='input_" + v['slug'] + "' data-parsley-mincheck='1' data-parsley-maxcheck='5' data-parsley-mincheck-message='Please select minimum 1 issues' data-parsley-maxcheck-message='Only 5 issues can be selected' data-parsley-errors-container='#issue_error_"+id[1]+"' required value='" + v['term_id'] + "' onClick=\"selectIssueTag('"+name+"','"+v['slug']+"','"+id[1]+"');\" style='opacity: initial; position: relative; height: 14px;'></div><div class='col-md-10 col-xs-10 label_issues' style='padding-left: 0px'><label for='" + v['slug'] + "' style='padding-left: 10px;'>" + v['name'] + "</label></div></div>";
						} else {
							html += "<div class='row therapy_issues' style='padding: 0 5%;'><div class='col-md-2 col-xs-2'><input type='checkbox' name='issues_"+id[1]+"[]' id='input_" + v['slug'] + "' value='" + v['term_id'] + "' onClick=\"selectIssueTag('"+name+"','"+v['slug']+"','"+id[1]+"');\" style='opacity: initial; position: relative; height: 14px;'></div><div class='col-md-10 col-xs-10 label_issues' style='padding-left: 0px'><label for='" + v['slug'] + "' style='padding-left: 10px;'>" + v['name'] + "</label></div></div>";
						}					
					});
					html += '</div><div id="issue_error_'+id[1]+'"></div><p>If the issues you practice is not listed here, please get in touch with us at <u>accountmanager1@thriive.in</u></p>';
				}
				ail.html(html);
			},
			error: function (err) {
				console.log(err);
			}
		});
	});

	// Filter Therapies after selecting Ailments on Therapist Page
	jQuery('.therapist-search-form .filter-therapist #sel5').change(function (e) {
		selected_ailment = this.value;
		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'getTherapyByAilment',
				'ailmentSlug': this.value
			},
			beforeSend: function () {
				jQuery('.therapist-search-form .filter-therapist .all_therapies .loader').show();
			},
			success: function (response) {
				jQuery('.therapist-search-form .filter-therapist .all_therapies .loader').hide();
				var html = '';
				var ail = jQuery('.therapist-search-form .filter-therapist #sel1');
				if (response == 'empty') {
					ail.html('');
					html += '<option value="">No therapies available</option>';
				} else {
					var data = JSON.parse(response);
					html = '<option value="">All Therapies</option>';
					jQuery.each(data, function (k, v) {
						html += '<option value="' + v['slug'] + '">' + v['name'] + '</option>';
					});
				}
				ail.html(html);
				jQuery('.therapist-search-form .filter-therapist #sel1').val(selected_therapy);
			},
			error: function (err) {
				console.log(err);
			}
		});
	});
	
	if(jQuery('.international-number').length > 0) {
		var international_number_input = document.querySelector(".international-number");
		var jsURL = window.location.protocol + "//" + window.location.host +"/wp-content/themes/thriive/assets/js/utils.js";
		int_number = intlTelInput(international_number_input, {
			initialCountry: "IN",
			separateDialCode: true,
    		// utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js",
    		utilsScript: jsURL,
    	});
    	
/*
    	$("#mobile-number").on('blur',function(){
	    	if(!int_number.isValidNumber()){
 		    	alert("please enter valid number");
		    	$(this).focus();
	    	}
    	});
*/
	}

/*
	if (window.location.href == window.location.origin + '/seeker-regsiter-landing-page' || window.location.href == window.location.origin + '/seeker-my-account-edit' || window.location.href == window.location.origin + '/therapist-registration' || window.location.origin + '/therapist-registration') {
		console.log('if');
		var international_number_input = document.querySelector(".international-number");
		intlTelInput(international_number_input, {
    	var international_number_input = document.querySelector(".international-number");
		int_number = intlTelInput(international_number_input, {
			initialCountry: "IN",
    		utilsScript: "https://intl-tel-input.com/node_modules/intl-tel-input/build/js/utils.js",
    	});
    } else {
	    console.log('else');
    }
*/
});

function show_more_tharapiest(){
	 $('.more_therapiest_listpg').each(function() {
		if(!$(this).hasClass("read_more_active")){
		 $(this).addClass("read_more_active");
        var content = $(this).html();
	        if(content.length > therapiest_showChar) {
	 
	            var c = content.substr(0, therapiest_showChar);
	            var h = content.substr(therapiest_showChar, content.length - therapiest_showChar);
	 
	            var html = c + '<span class="moreellipses">' + therapiest_ellipsestext+ '&nbsp;</span>';
	            //var html = c + '<span class="moreellipses">' + therapiest_ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="#" class="therapiest_morelink">' + therapiest_moretext + '</a></span>';
	 
	            $(this).html(html);
	        }
 		}
    });
	// $('.tlistpage').each(function(i) {
	// 	$(this).attr('id', i);
	// 	var id = $(this).attr('id');
	// 	if((id != 0) && (id % 3 == 0)){
	// 		$('#'+id).after('<div class="trigger_'+id+'">call after again</div>');
	// 	}
	// });
	$('.more_therapiest').each(function() {
		if(!$(this).hasClass("read_more_active")){
		 $(this).addClass("read_more_active");
        var content = $(this).html();
	        if(content.length > testimonail_showChar) {
	 
	            var c = content.substr(0, testimonail_showChar);
	            var h = content.substr(testimonail_showChar, content.length - testimonail_showChar);
	            var html = c + '<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="#" class="therapiest_morelink">' + therapiest_ellipsestext + '</a></span>';
	 
	            $(this).html(html);
	        }
 		}
    });

	$("#add_review").unbind('click').click(function(e){
		if($("#connect_with_healer_login").length >= 1){
			e.preventDefault();
			$("#connect_with_healer_login").modal('show');
			return false;
		}
	});
	$("#add_review_top").unbind('click').click(function(e){
		if($("#connect_with_healer_login").length >= 1){
			e.preventDefault();
			$("#connect_with_healer_login").modal('show');
			return false;
		}
	});
	 
   //Call now button functionality
   $(".call_now_link").unbind('click').click(function(e){
	e.preventDefault();
	if($("#connect_with_healer_login").length >= 1){
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'call now clicked - mobile',
		});
		$("#call_with_healer").modal('show');
		return false;
	}
	var id = $(this).attr('id').split("_");
	var therapist_email = $("#therapist_"+id[2]).val();
	var seeker_email = $("#seeker_"+id[2]).val();
	if(therapist_email == "" || seeker_email == ""){
		alert("Please try again later!");
		return false;
	}
	var masked_number = "";
	$('.ajax-loader').show();
	setTimeout(function(){
		$.ajax({
			type : "POST",
			url : ajax_object.ajax_url,
			async : false,
			data : {action: "assign_masked_number_to_user", therapist_email:therapist_email, seeker_email:seeker_email},
			success: function(response) {
				if(response.data.status == "success"){
					gtag('event', 'click', {
						event_category: 'button',
						event_label: 'call now initiated - mobile',
					});
					masked_number = response.data.masked_number;                   		
				}else{
					alert(response.data.error_msg);
					return false;
				}
				if(masked_number != 0 || masked_number != undefined){
					$("#call_link_"+id[2]).attr("href","tel:"+masked_number);
					setTimeout(function(){
						$("#call_link_"+id[2])[0].click();	
					}, 100);
				}
			},
			error: function (xhr, exception) {
				alert(xhr.responseText);
			    $('.ajax-loader').hide();
			},
			complete: function(){
				$('.ajax-loader').hide();	
			}
	     }); 
	}, 100);
});


   $(".call_now_link_oc").unbind('click').click(function(e){
	e.preventDefault();
	var slug = $(this).data('slug');
	var therapy = $(this).data('therapy');
	if($("#connect_with_healer_login").length >= 1){
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'online - call now clicked - mobile',
		});
		$(".modal-body #reg_unhide #slug").val(slug);
		$(".modal-body #reg_unhide #action").val('call');
		$(".modal-body #reg_unhide #therapy").val(therapy);
		$("#call_with_healer").modal('show');
		return false;
	}
	var id = $(this).attr('id').split("_");
	var therapist_email = $("#therapist_"+id[2]).val();
	var seeker_email = $("#seeker_"+id[2]).val();
	if(therapist_email == "" || seeker_email == ""){
		alert("Please try again later!");
		return false;
	}
	window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q="+slug+"&a=call&t="+therapy); 
	// var masked_number = "";
	// $('.ajax-loader').show();
	// setTimeout(function(){
	// 	$.ajax({
	// 		type : "POST",
	// 		url : ajax_object.ajax_url,
	// 		async : false,
	// 		data : {action: "assign_masked_number_to_user", therapist_email:therapist_email, seeker_email:seeker_email},
	// 		success: function(response) {
	// 			if(response.data.status == "success"){
	// 				gtag('event', 'click', {
	// 					event_category: 'button',
	// 					event_label: 'online - call now initiated - mobile',
	// 				});
	// 				masked_number = response.data.masked_number;                   		
	// 			}else{
	// 				alert(response.data.error_msg);
	// 				return false;
	// 			}
	// 			if(masked_number != 0 || masked_number != undefined){
	// 				$("#call_link_"+id[2]).attr("href","tel:"+masked_number);
	// 				setTimeout(function(){
	// 					$("#call_link_"+id[2])[0].click();	
	// 				}, 100);
	// 			}
	// 		},
	// 		error: function (xhr, exception) {
	// 			alert(xhr.responseText);
	// 		    $('.ajax-loader').hide();
	// 		},
	// 		complete: function(){
	// 			$('.ajax-loader').hide();	
	// 		}
	//      }); 
	// }, 100);
});

//Call now button functionality
$(".consult_online_link").unbind('click').click(function(e){
	e.preventDefault();
	if($("#connect_with_healer_login").length >= 1){
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'call now clicked - desktop',
		});
		$("#call_with_healer").modal('show');
		return false;
	}
	var id = $(this).attr('id').split("_");
	var therapist_email = $("#therapist_"+id[2]).val();
	var seeker_email = $("#seeker_"+id[2]).val();
	if(therapist_email == "" || seeker_email == ""){
		alert("Please try again later!");
		return false;
	}
	$('.ajax-loader').show();
	setTimeout(function(){
	$.ajax({
		type : "POST",
		url : ajax_object.ajax_url,
		async : false,
		data : {action: "consult_online_thriive_therapist", therapist_email:therapist_email, seeker_email:seeker_email},
		success: function(response) {
			if(response.data.status == "success"){
				gtag('event', 'click', {
					event_category: 'button',
					event_label: 'call now initiated - desktop',
				});
				//alert("Thanks for consulting our verified therapist.We have sent you an SMS and an email with their details.");                   		
			}else{
				alert("Something went wrong !!");
				return false;
			}
		},
		error: function (xhr, exception) {
			alert(xhr.responseText);
			$('.ajax-loader').hide();
		},
		complete: function(){
			$('.ajax-loader').hide();	
		}
     }); 
     }, 100);  
});

$(".consult_online_link_oc").unbind('click').click(function(e){
	e.preventDefault();
	var slug = $(this).data('slug');
	var therapy = $(this).data('therapy');
	if($("#connect_with_healer_login").length >= 1){
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'call now clicked - desktop',
		});
		$(".modal-body #reg_unhide #slug").val(slug);
		$(".modal-body #reg_unhide #action").val('call');
		$(".modal-body #reg_unhide #therapy").val(therapy);
		$("#call_with_healer").modal('show');
		return false;
	}
	var id = $(this).attr('id').split("_");
	var therapist_email = $("#therapist_"+id[2]).val();
	var seeker_email = $("#seeker_"+id[2]).val();
	if(therapist_email == "" || seeker_email == ""){
		alert("Please try again later!");
		return false;
	}
	window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q="+slug+"&a=call&t="+therapy); 
	// $('.ajax-loader').show();
	// setTimeout(function(){
	// $.ajax({
	// 	type : "POST",
	// 	url : ajax_object.ajax_url,
	// 	async : false,
	// 	data : {action: "consult_online_thriive_therapist", therapist_email:therapist_email, seeker_email:seeker_email},
	// 	success: function(response) {
	// 		if(response.data.status == "success"){
	// 			gtag('event', 'click', {
	// 				event_category: 'button',
	// 				event_label: 'call now initiated - desktop',
	// 			});
	// 			alert("Thanks for consulting our verified therapist.We have sent you an SMS and an email with their details.");                   		
	// 		}else{
	// 			alert("Something went wrong !!");
	// 			return false;
	// 		}
	// 	},
	// 	error: function (xhr, exception) {
	// 		alert(xhr.responseText);
	// 		$('.ajax-loader').hide();
	// 	},
	// 	complete: function(){
	// 		$('.ajax-loader').hide();	
	// 	}
 //     }); 
 //     }, 100);  
});

$('#connect_with_healer,#connect_with_healer_login').on('shown.bs.modal', function (e) {
	$(this).find(".error_msg_div").html("");
});
$('#seeker_reg_form_modal').on('submit', function (e) {
	e.preventDefault();
	var parent_frm = $('#seeker_reg_form_modal :input');
	
	if ($(this).parsley('isValid')) {
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'chat signup started',
		});
		var form_data = parent_frm.serialize();
		$.ajax({
		       	url: ajax_object.ajax_url,
			   	type: 'POST',
			   	data: {'action': 'validate_seeker_modal', 'seeker_form_data': form_data},
			   	success: function (data){
			   		data = $.parseJSON(data);
			   		if(data.resStatus == "error"){
		        		$(".error_msg_div").html(data.resMessage);
		        	}else{
		        		window.location.href = window.location.href;	
		        	}
		       	}
		   	});
		return false;
	}
});

	$('#signup_submit').click(function () {
		gtag('event', 'click', {
			event_category: 'button',
			event_label: 'lead form signup',
		});
	}); 
}

$("body").on("click",".therapiest_morelink",function(){
	    var $this = $(this);
        if($($this).hasClass("less")) {
	        console.log("on less", $($this).parent().prev());
            $($this).removeClass("less");
            $($this).html("...");
        } else {
            $($this).addClass("less");
            $($this).html("read less");
        }
        $($this).parent().prev().toggle();
        $($this).prev().toggle();
        return false;
});	
	
	
	

var lFollowX = 0,
	lFollowY = 0,
	x = 0,
	y = 0,
	friction = 1 / 30;

function moveBackground() {
	x += (lFollowX - x) * friction;
	y += (lFollowY - y) * friction;

	translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';

	$('.bg').css({
		'-webit-transform': translate,
		'-moz-transform': translate,
		'transform': translate
	});

	window.requestAnimationFrame(moveBackground);
}

$(window).on('mousemove click', function (e) {

	var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
	var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
	lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
	lFollowY = (10 * lMouseY) / 100;

});


$(function () {
	$('.timepicker').timepicki();

	// $( "#dob , .date_picker" ).datepicker({
	// 	changeMonth: true,
	// 	changeYear: true,
	// 	yearRange: "-100:+0",
	// });

	$(document).on('focusin', '#dob , .date_picker', function () {
		$(this).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-100:+0",
		});
	});

	var dateFormat = "mm/dd/yy",
		from = $("#start_date")
		.datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1
		})
		.on("change", function () {
			to.datepicker("option", "minDate", getDate(this));
		}),
		to = $("#end_date").datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1
		})
		.on("change", function () {
			from.datepicker("option", "maxDate", getDate(this));
		});

	function getDate(element) {
		var date;
		try {
			date = $.datepicker.parseDate(dateFormat, element.value);
		} catch (error) {
			date = null;
		}

		return date;
	}



	//$( "#start_date" ).datepicker({});
	//$( "#end_date" ).datepicker();

	/*
	    $(".wrapper-listing").slice(0, 3).show();
	    $("#loadMore").on('click', function (e) {
	        e.preventDefault();
	        $(".wrapper-listing:hidden").slice(0, 3).slideDown();
	        if ($(".wrapper-listing:hidden").length == 0) {
	            $("#loadMore").fadeOut('slow');
	        }
	        $('html,body').animate({
	            scrollTop: $(this).offset().top
	        }, 1500);
	    });
	*/


	/*
	    $(".package-wrapper").on("click",function(){
		    var radioBox = $(this).find('input[type="radio"]');	   
		    $(this).find('input[type="radio"]').prop("checked", !radioBox.prop("checked"));
		    
	    });
	*/


	$(".btn-upload").click(function (e) {
		$(this).next("input[type=file]").trigger('click');
		e.preventDefault();
	});

	// delete ajax_upload image (blueimp)
	$(".imagePreview").on('click', '.close', function () {
		//console.log("Hello");
		var $this = $(this);
		var row_index = $this.attr('data-row_id');
		$this.closest(".imagePreview").addClass('rfa_loader');

		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'deleteCertificate',
				'row_index': row_index
			},
			success: function (data) {
				//console.log(data);
				$this.closest(".imagePreview").removeClass('rfa_loader').html(data);
				//$this.closest(".imagePreview");
			},
			complete: function (data) {},
			error: function (err) {
				$this.closest(".imagePreview").removeClass('rfa_loader');
			}
		});
	});

	$('input[type=file]').change(function () {
		var $this = $(this);
		var files = !!this.files ? this.files : [];
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support


		if (/^image/.test(files[0].type)) { // only image file
			for (var i = 0; i < files.length; i++) {
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[i]); // read the local file

				reader.onloadend = function () { // set image data as background of div
					//console.log(files[0].size);
					if (files[0].size <= 20971520) {
						if (files.length == 1) {
							$this.closest(".form-group").find(".imagePreview").html("");
						}
						$this.closest(".form-group").find(".imagePreview").append('<img src="' + this.result + '" />').css({
							"display": "block"
						});
						//$this.closest(".form-group").find(".imagePreview1").css({"background-image": "url("+this.result+")","display":"block"});
					}
				}
			}
		} else {
			var vals = $(this).val();
			val = vals.length ? vals.split('\\').pop() : '';
			$(this).closest(".form-group").find('.text-show').html(val);
		}

		/*
			    var vals = $(this).val();
			    val = vals.length ? vals.split('\\').pop() : '';
			    $(this).next('.text-show').html(val);
		*/

	});

	$("#personal_details").on("submit",function(e){
		$('#cover-spin').show(0);
	});
	$("#package_details").on("submit",function(e){
		$('#cover-spin').show(0);
	});
	$("#about_youself_form").on("submit",function(e){
		$('#cover-spin').show(0);
	});
	$("#verification_details").on("submit",function(e){
		$('#cover-spin').show(0);
	});
	$("#payment_processing").on("submit",function(e){
		$('#cover-spin').show(0);
	});

	// $("#form-step-2, #form-step-3 ,#form-step-4, #form-step-5").addClass("d-none");

	/*
	    $("#personal_details").on("submit",function(e){
			 $("#form-step-1, #form-step-3 ,#form-step-4, #form-step-5").addClass("d-none");
	    });
	    
	    $("#package_details").on("submit",function(e){
			 $("#form-step-1, #form-step-2 ,#form-step-4, #form-step-5").addClass("d-none");
	    });
	    
	    $("#about_youself_form").on("submit",function(e){
			 $("#form-step-1, #form-step-2 ,#form-step-3, #form-step-5").addClass("d-none");
	    });
	    
	    $("#verification_details").on("submit",function(e){
			 $("#form-step-1, #form-step-2 ,#form-step-3, #form-step-4").addClass("d-none");
	    });
	*/



	/*
	    $("#personal_details").on("submit",function(e){
		    var form = $(this);
		    form.parsley().validate();   
		    if (form.parsley().isValid()){
				form.hide();
				form.parents("#form-step-1").hide();
				$("#form-step-2").addClass('d-block');
				//$("#form-step-2").parents(".package-selection-section").show();
				$(".form-list-page ul li").removeClass("active");
				$(".form-list-page ul li:nth-child(2)").addClass("active");
			} 
		     e.preventDefault();
	    });
	*/
	/*
		$('#location-list').change(function() {
			
		});
	*/

});


$(window).scroll(function () {
	if ($(this).scrollTop() > 50) {
		$('.totop a').fadeIn();
	} else {
		$('.totop a').fadeOut();
	}
});

jQuery(".select_package input[name=package]").click(function () {
	//var radioValue = $('input[name=package]:checked').val();
	//console.log(packageRadioValue);
	var radioValue = jQuery(this).val();
	//console.log(radioValue);
	if (radioValue) {
		var therapyLimts = jQuery(this).parents('.select_package').data('package_limit');
		var packageName = jQuery(this).parents('.select_package').data('package_name');
		//console.log(packageName);
		jQuery('#total_therapies').val(therapyLimts);
		jQuery.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'getTherapyList',
				'therapy_count': therapyLimts,
				'package_name': packageName
			},
			success: function (data) {
				//console.log(data);
				packageRadioValue = radioValue;
				$('.therapy-list').html('');
				jQuery('.therapy-list').append(data);
				$('.select-list-item').select2();
			},
			complete: function (data) {},
			error: function (err) {}
		});
	}
	/*
else {
		 	$('.therapy-list').html('');
	 	}
*/
});

$('#form_send_otp').on('submit', function (e) {
	e.preventDefault();
	e.stopPropagation();

	if ($(this).parsley().isValid()) {
		$("#mobileExist").html("");
		if(!int_number.isValidNumber()){
			//alert("please enter valid number");
			$("#mobileExist").html("Invalid Number");
			//console.log("invalid number");
		    //$(this).focus();
			return false;
	    } 

		//console.log($( "#mobile-number" ).val());
		var country_code = $('.iti__country.iti__active').attr('data-dial-code');
		//console.log(country_code);
		var trimStr = $("#mobile-number").val();
		var trimStr = trimStr.replace(/\s/g, '');
		var mobileNumber = trimStr.replace('+' + country_code, '');
		sendOTP(country_code, mobileNumber);
		//sendOTP(country_code, trimStr);
	}
});
/*jQuery("#send_otp").click(function (e) 
{
	e.preventDefault();
	e.stopPropagation(); 
	if($("#form_send_otp").parsley().isValid())
	{ 
		sendOTP($( "#mobile-number" ).val());
	}
});*/

$("#re_send_otp").click(function (e) {
	e.preventDefault();
	e.stopPropagation();
	$("#mobileExist").html("");
	if(!int_number.isValidNumber()){
	    //alert("please enter valid number");
	    $("#mobileExist").html("Invalid Number");
	    //console.log("invalid number");
    	//$(this).focus();
    	return false;
    }
	//sendOTP($("#mobile-number").val());
	var country_code = $('.iti__country.iti__active').attr('data-dial-code');
	var trimStr = $("#mobile-number").val();
	var trimStr = trimStr.replace(/\s/g, '');
	var mobileNumber = trimStr.replace('+' + country_code, '');
	//console.log(country_code);
	sendOTP(country_code, mobileNumber);
});

$("#resend_otp").click(function (e) {
	e.preventDefault();
	e.stopPropagation();
	var mobile_number = $('#mobile_number').val();
	var country_code = $('#country_code').val();
	var user_id = $('#user_id').val();
	jQuery.ajax({
       url: ajax_object.ajax_url,
       type: 'POST',
       data: {'action': 'callresendOTP', 'mobile_number': mobile_number, 'country_code': country_code, 'user_id': user_id},
       success: function (data) {
		    var jsonObj = JSON.parse(data);
		    if(jsonObj.resStatus=='success'){
		       $("#error_msg_otp").text("");
		       $("#otp_msg").text("");
	           $("#otp_msg").text("OTP resent on "+mobile_number);
	       	} else {
		     	$("#error_msg_otp").text(jsonObj.resMessage);
	       	}   
		},
		complete: function (data) {
			console.log('complete. :  ' + data);
		},
		error: function (err) {
			console.log('error. :  ' + err);
		}
	});
});

/*
function sendOTP(country_code, mobileNumber) {
// 	console.log(country_code + mobileNumber);
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'sendOTP',
			'mobile_number': mobileNumber,
			'country_code': country_code
		},
		success: function (data) {
// 			console.log(data);
			try {
				var jsonObj = JSON.parse(data);
				if (jsonObj.success == false) {
					jQuery("#mobileExist").text(jsonObj.msg);
				} else {
					if (jsonObj.resStatus == 'success') {
						jQuery("#mobileExist").text("");
						jQuery("#send_otp").removeClass("d-inline");
						jQuery("#send_otp").addClass("d-none");
						jQuery("#div_verify_otp").removeClass("d-none");
						jQuery("#div_verify_otp").removeClass("d-inline");
						//jQuery("#form_send_otp");
						if ($("#otp_response").length) {
							$("#otp_response").text("A 4 digit OTP has been re-sent to your mobile number.");
						} else {
							$("#form_send_otp").after("<span id='otp_response' class='col-md-12'>Please enter below the 4 digit OTP sent to your mobile number.</span><br><br>");
						}
					} else {
						alert(jsonObj.resMessage);
					}
	    } 
		//sendOTP($( "#mobile-number" ).val());
		var country_code = $('.iti__country.iti__active').attr('data-dial-code');
		var trimStr = $("#mobile-number").val();
		var trimStr = trimStr.replace(/\s/g, '');
		var mobileNumber = trimStr.replace('+' + country_code, '');
		//console.log(country_code);
		sendOTP(country_code, mobileNumber);
});
*/

function sendOTP(country_code, mobileNumber){
	//console.log(country_code +mobileNumber);
	jQuery.ajax({
       url: ajax_object.ajax_url,
       type: 'POST',
       data: {'action': 'sendOTP', 'mobile_number': mobileNumber, 'country_code': country_code},
       success: function (data) {
	       //console.log(data);
	       try {
		        var jsonObj = JSON.parse(data);
		        if(jsonObj.success == false){
			        jQuery("#mobileExist").text(jsonObj.msg);
		        } else {
			      	if(jsonObj.resStatus=='success'){
				      jQuery("#mobileExist").text("");
					   jQuery( "#send_otp" ).removeClass( "d-inline" );
			           jQuery( "#send_otp" ).addClass( "d-none" );
			           jQuery( "#div_verify_otp" ).removeClass( "d-none" );
			           jQuery( "#div_verify_otp" ).removeClass( "d-inline" );  
			           //jQuery("#form_send_otp");
			           if($("#otp_response").length)
					   {
						   $("#otp_response").text("A 4 digit OTP has been re-sent to your mobile number.");
					   }
					   else
					   {
						   $("#form_send_otp").after("<span id='otp_response' class='col-md-12'>Please enter below the 4 digit OTP sent to your mobile number.</span><br><br>");
					   }
			       } else {
				     	alert(jsonObj.resMessage);  
			       }
				}
			} catch (err) {
				console.log('err. :  ' + err);
			}
		},
		complete: function (data) {
			console.log('complete. :  ' + data);
		},
		error: function (err) {
			console.log('error. :  ' + err);
		}
	});
}

function setCurrentStage(currentStage) {
	try {
		//alert(currentStage);
		$(".form-list-page ul li").removeClass("active");
		$(".form-list-page ul li:nth-child(" + (currentStage) + ")").addClass("active");
		if (currentStage == 1) {
			$("#form-step-1").removeClass("d-none");
			$("#form-step-2, #form-step-3 ,#form-step-4, #form-step-5").addClass("d-none");
		} else if (currentStage == 2) {
			$("#form-step-2").removeClass("d-none");
			$("#form-step-1, #form-step-3 ,#form-step-4, #form-step-5").addClass("d-none");
		} else if (currentStage == 3) {
			$("#form-step-3").removeClass("d-none");
			$("#form-step-1, #form-step-2 ,#form-step-4, #form-step-5").addClass("d-none");
		} else if (currentStage == 4) {
			$("#form-step-4").removeClass("d-none");
			$("#form-step-1, #form-step-2 ,#form-step-3, #form-step-5").addClass("d-none");
		} else if (currentStage == 5) {
			$("#form-step-5").removeClass("d-none");
			$("#form-step-1, #form-step-2 ,#form-step-3, #form-step-4").addClass("d-none");
		}
	} catch (err) {
		console.log('err. :  ' + err);
	}
}

function changeCurrentStage(stage) {
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'changeStage',
			'stage_number': stage
		},
		success: function (data) {
			try {
				var jsonObj = JSON.parse(data);
				if (jsonObj.resStatus == 'success') {
					setCurrentStage(stage)
				} else {
					//alert(jsonObj.resMessage);  
				}
			} catch (err) {
				console.log('err. :  ' + err);
			}
		},
		complete: function (data) {
			console.log('complete. :  ' + data);
		},
		error: function (err) {
			console.log('error. :  ' + err);
		}
	});
}

jQuery("#verify_otp").click(function (e) {
	e.preventDefault();
	e.stopPropagation();
	var otpNumber = jQuery("#mobile-otp").val();
	var leadformid = jQuery("#lead_form_id").val();
	var submission_email = jQuery("#submission_email").val();
	jQuery(".loading-msg").show();
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'verifyOTP',
			'mobile_otp': otpNumber,
			'leadformid': leadformid,
			'submission_email': submission_email
		},
		success: function (data) {
			jQuery(".loading-msg").hide();
			try {
				var jsonObj = JSON.parse(data);
				if (jsonObj.resStatus == 'success') {
					gtag('event', 'click', {
						event_category: 'button',
						event_label: 'chat signup completed',
					});
					jQuery("#mobile_verfication_modal").modal('hide');
					if ($("#verify_otp").attr("data-redirect")) {
						var redirect = $("#verify_otp").attr("data-redirect");
						window.location.href = redirect;
					}
				} else {
					//alert(jsonObj.resMessage);
					jQuery(".loading-msg").hide();
					jQuery(".otp-error").text(jsonObj.resMessage);
				}
			} catch (err) {}
		},
		complete: function (data) {
			console.log(data);
			jQuery(".loading-msg").hide();
		},
		error: function (err) {
			console.log(err);
			jQuery(".loading-msg").hide();
		}
	});
});


jQuery("#sub_therapies_list_load_more").click(function () {
	var taxonomy = jQuery(this).data('taxonomy');
	var parent = jQuery(this).data('parent');
	var page = jQuery(this).data('page');
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'getSubTaxonomyDetails',
			'taxonomy': taxonomy,
			'parent': parent,
			'page': page
		},
		success: function (data) {
			//console.log(data);
		},
		complete: function (data) {},
		error: function (err) {}
	});
});

jQuery("#therapist_load_more").click(function () {
	var taxonomy = jQuery(this).data('taxonomy');
	var post_type = jQuery(this).data('post_type');
	var page = jQuery(this).data('page');
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'getTherapistData',
			'taxonomy': taxonomy,
			'post_type': post_type,
			'page': page
		},
		success: function (data) {
			//console.log(data);
		},
		complete: function (data) {},
		error: function (err) {}
	});
});

jQuery("#event_load_more").click(function () {
	console.log('event load more');
	var post_id = jQuery(this).data('post_id');
	var post_type = jQuery(this).data('post_type');
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'getEventsByTherapist',
			'post_id': post_id,
			'post_type': post_type
		},
		success: function (data) {
			console.log(data);
		},
		complete: function (data) {},
		error: function (err) {}
	});
});


$("#deleteMyBlog").click(function (e) {
	e.preventDefault();
	var rediect = $(this).data("redirect");
	var row_index = $(this).data("index");

	var confirm_delete = confirm("Hey! Are you sure you want to delete this blog?");
	if (confirm_delete) {
		$.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'deleteMyBlog',
				'row_index': row_index
			},
			success: function (data) {
				//console.log(data);return;	
				if (data) {
					window.location.href = rediect;
				}
			},
			error: function (err) {
				console.log('Error: '.data);
			}
		});
	}
});
$("#upgradePackage, #renewPackage").on('hidden.bs.modal', function (e) {
	//console.log("hello");
	$("#btnUpgradePackage, #btnRenwPackage").addClass("d-inline").removeClass("d-none");
	$("#closeUpgradePackage, #closeRenewPackage").text("CANCEL");
	$(".renew_text, .upgrade_text").show();
	$(".renew_text_msg, .upgrade_text_msg").hide();
	$("#upgradePackage").find("#btnUpgradePackage").removeAttr("data-packageid");
});
$("a[data-target='#upgradePackage']").on("click", function () {
	var packageid = $(this).data("packageid");
	$("#upgradePackage").find("#btnUpgradePackage").attr("data-PackageID", packageid);
});

jQuery(".gform_wrapper .career_designation select").on('change', function () {
	var designation = $(this).val();
	if (designation == "Manager") {
		careerPostMsg($(this), "Text goes here for Manager post");
	} else if (designation == "Content Writer") {
		careerPostMsg($(this), "Text goes here for Content Writer post");
	} else if (designation == "Marketing") {
		careerPostMsg($(this), "Text goes here for Marketing post");
	} else {
		$("#designation_msg").remove();
	}
});

function careerPostMsg(afterTo, msg) {
	if ($("#designation_msg").length) {
		$("#designation_msg").text(msg);
	} else {
		afterTo.after("<p id='designation_msg' class='mt-10'>" + msg + "</p>");
	}
}

jQuery("#delete_user").click(function (e) {
	e.preventDefault();
	jQuery(this).html('Please wait...');
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'deleteUser',
			'activity': 'deleting_account'
		},
		success: function (data) {
			if (data) {
				$("#delete_user").html('Yes');
				$('#delete_default_msg, #btnNo, #delete_user').hide().removeClass('d-inline');
				$('#result_delete_user').show();
				$('#delete_reason_submit').show();
			}
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});
});
jQuery("input[name='delete_reason']").change(function () {
	$("#tell_us_more_block").show();
});
jQuery('#form_delete_user').on('submit', function (e) {
	e.preventDefault();
	e.stopPropagation();
	if ($(this).parsley().isValid()) {
		jQuery("#delete_reason_submit").html('Please wait...');
		var reason = $("input[name='delete_reason']:checked").val();
		var tell_us_more = $("#tell_us_more").val();

		$.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'deleteUser',
				'reason': reason,
				'tell_us_more': tell_us_more,
				'activity': 'unsubscribe'
			},
			success: function (data) {
				console.log(data);
				if (data) {
					$('#result_delete_user').html('<p>Thank you for your response.</p><p>You have successfully deleted your account. We are sorry to have to say goodbye to you but we hope it is a temporary separation.</p><p>In case you change your mind, you can always connect with us on <a href="thriive.in">thriive.in</a></p>');
					$('#delete_reason_submit').html('Unsubscribe').hide();
					$('#btnNo').show().addClass('d-inline');
					$('#btnNo').html('Close');
				}
			},
			error: function (err) {
				console.log('Error: '.data);
			}
		});
	}
});

//Ajax Search
var currentRequest = null; //variable to check ajax request is pending or not
$(".seachform-section input").on('keyup', function () {
	$(".autocomplete-result").html("<li>Loading...</li>").css({'border':'1px solid #c5c5c5'});
	var lengthCount = $(this).val().length;
	var searchValue = $(this).val();
	//ajaxSearch(lengthCount,searchValue); 	//Create function if need to use multiple times
	if (lengthCount > 2) 
	{
		currentRequest = $.ajax({
			url: ajax_object.ajax_url,
			type: 'POST',
			data: {
				'action': 'ajax_search',
				'search': searchValue
			},
			beforeSend: function () {
				//stop previous ajax request
				if (currentRequest != null) {
					currentRequest.abort();
				}
			},
			success: function (res) {
				//console.log(res);return;
				var html = "";
				for (var i = 0; i < res.data.length; ++i) {
					//$(".autocomplete-result").append("<li>" + res.data[i] + "</li>");
					html += "<li>" + res.data[i] + "</li>";
				}
				$(".autocomplete-result").html(html).css({'border':'1px solid #c5c5c5'});
			},
			error: function (err) {
				console.log('Error: '.err);
			}
		});
	} 
	else 
	{
		$(".autocomplete-result").html("").css({'border':'none'});
		
	}
});
$(document).click(function (e) {
	if (e.target.type != 'search') {
		$(".autocomplete-result").hide();
	} else {
		$(".autocomplete-result").show();
	}
});
$('.autocomplete-result').on('click', 'li', function () {
	var suggesstion = $(this).text();
	var hostname = (window.location.hostname == 'localhost') ? 'http://localhost/thriive' : window.location.origin;
	var redirect = hostname + '?s=' + encodeURI(suggesstion);
	//console.log(redirect);
	$(".seachform-section input").val(suggesstion).focus();
	window.location.href = redirect;
});
//End Ajax search

// $("input[type='file']").on("change", function() 
// {
// 	$this = $(this);
// 	//Allowing only 20mb to upload. Converting MB into Byte (1024 * 20 * 1024 = 20971520) 
// 	$($(this)[0].files).each(function(key, value)
// 	{
// 		if(value.size > 20971520)
// 	    {
// 	    	//Error
// 	    	$("input[type='file']").val(null);
// 	    	//20 MB
// 	    	alert("File size must be less than or equal to 20 MB.");
// 	        value.name = "";
// 	        //$this.closest(".form-group").find(".imagePreview").html("");
// 	        return false;
// 	    }
// 	    else
// 	    {
// 	    	//Success (Run this block if uploading image via ajax)

// 	    	data = new FormData();	//creating form object.
// 	    	data.append('file', value); //appending file(image) to form object.

// 	    	$.ajax({
// 			  url: "http://localhost/thriive-dev/test.php",
// 			  type: "POST",
// 			  data: data,
// 			  enctype: 'multipart/form-data',
// 			  processData: false,  // tell jQuery not to process the data
// 			  contentType: false   // tell jQuery not to set contentType
// 			})
// 			.done(function(data)
// 			{
// 				console.log(data);
// 			});
// 	    }
// 	});
// });

//submit_request_blog old is pass in button clicked changed with class name updated below #submit_request_blog
jQuery(".submit_request_blog_id").click(function (e) {
	e.preventDefault();
	//$(this).removeClass("d-inline").addClass("d-none");
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'requestForBlog'
		},
		success: function (data) {
			$(".submit_request_blog_id").removeClass("d-inline").addClass("d-none");
			$('#result_blog').html(data);
			$("#btn_cancel_blog").removeAttr("data-dismiss");
			$("#btn_cancel_blog").attr('onClick', 'location.reload();');
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});

});

jQuery("#submit_request_news_letter").click(function (e) {
	e.preventDefault();
	//$(this).removeClass("d-inline").hide("d-none");
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'requestForNews'
		},
		success: function (data) {
			$("#submit_request_news_letter").removeClass("d-inline").hide("d-none");
			$('#result_news').html($.trim(data));
			$("#btn_cancel_news").removeAttr("data-dismiss");
			$("#btn_cancel_news").attr('onClick', 'location.reload();');
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});

});

jQuery("#contact_account_manager").click(function (e) {
	//e.preventDefault();
	var accountManager = $('#accountMsg').val();
	console.log(accountManager);
	//return;
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'contactAccountManager',
			'accountManager': accountManager
		},
		success: function (data) {
			//console.log(data);	
			$('#result_accountManager').html($.trim(data));
			$('#accountMsg, #adminPopupDefault, #contact_account_manager').hide().removeClass("d-inline");
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});

});
$("#request_popup, #request_for_blog, #request_for_news").on("hidden.bs.modal", function (e) {
	$('#accountMsg, #adminPopupDefault, #contact_account_manager').show().addClass("d-inline");
	$("#result_accountManager").html("");
});
$(".togglePassword").click(function () {
	var $this = $(this);
	if ($this.find(".fa").hasClass("fa-eye")) {
		$this.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
		$this.siblings().attr("type", "password");
	} else {
		$this.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
		$this.siblings().attr("type", "text");
	}
});
$("input[name=identity_option]").click(function () {
	var identity_number = $(this).val();
	console.log(identity_number);
	if (identity_number == "Pan_Card") {
		$("#pan-number").attr("data-parsley-type", "alphanum");
		$("#pan-number").attr("data-parsley-minlength", "10");
		$("#pan-number").attr("data-parsley-maxlength", "10");
		$("#pan-number").attr("data-parsley-pattern", "/[a-zA-Z]{5}[0-9]{4}[A-Z]{1}/");

		$("#pan-number").attr("data-parsley-type-message", "PAN number must be an alphanumeric");
		$("#pan-number").attr("data-parsley-minlength-message", "PAN number must be 10 digits");
		$("#pan-number").attr("data-parsley-maxlength-message", "PAN number must be 10 digits");
		$("#pan-number").attr("data-parsley-pattern-message", "Please enter a valid PAN number");
	} else if (identity_number == "Adhaar") {
		$("#pan-number").attr("data-parsley-type", "number");
		$("#pan-number").attr("data-parsley-minlength", "12");
		$("#pan-number").attr("data-parsley-maxlength", "12");
		$("#pan-number").removeAttr("data-parsley-pattern");

		$("#pan-number").attr("data-parsley-type-message", "Adhaar number must be a number");
		$("#pan-number").attr("data-parsley-minlength-message", "Adhaar number must be 12 digits");
		$("#pan-number").attr("data-parsley-maxlength-message", "Adhaar number must be 12 digits");
		$("#pan-number").removeAttr("data-parsley-pattern-message");
	} else if (identity_number == "TIN") {
		$("#pan-number").attr("data-parsley-type", "number");
		$("#pan-number").attr("data-parsley-minlength", "9");
		$("#pan-number").attr("data-parsley-maxlength", "9");
		$("#pan-number").removeAttr("data-parsley-pattern");

		$("#pan-number").attr("data-parsley-type-message", "TIN number must be a number");
		$("#pan-number").attr("data-parsley-minlength-message", "TIN number must be 9 digits");
		$("#pan-number").attr("data-parsley-maxlength-message", "TIN number must be 9 digits");
		$("#pan-number").removeAttr("data-parsley-pattern-message");
	} else if (identity_number == "Passport") {
		$("#pan-number").attr("data-parsley-type", "alphanum");
		$("#pan-number").attr("data-parsley-minlength", "8");
		$("#pan-number").attr("data-parsley-maxlength", "8");
		$("#pan-number").attr("data-parsley-pattern", "/[a-zA-Z]{1}[0-9]{7}/");

		$("#pan-number").attr("data-parsley-type-message", "Passport must be an alphanumeric");
		$("#pan-number").attr("data-parsley-minlength-message", "Passport number must be 8 digits");
		$("#pan-number").attr("data-parsley-maxlength-message", "Passport number must be 8 digits");
		$("#pan-number").attr("data-parsley-pattern-message", "Please enter a valid passport number");
	}
});
$("#add_therapy_field").click(function () {
	var total_therapies = $("#total_therapies").val();
	//console.log(total_therapies);
	var form_data = $("#edit_therapies").serialize();
	//console.log(form_data);
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'generateTherapistFields',
			'total_therapies': total_therapies
		},
		success: function (data) {

			if ($.trim(data) != 'FALSE') {
				$("#add_more_therapy").append(data);
				$("#total_therapies").val(parseInt(total_therapies) + 1);
				$('.select-dropdown-list').select2();
			} else {
				$("#limit_reached").text("You have reached your maximum limits. Please upgrade your package to add more therapy.");
				//If remove add therapy button
				//$("#add_therapy_field").remove();
			}
		},
		complete: function (data) {},
		error: function (err) {}
	});

});

jQuery("#btnRenwPackage").click(function (e) {
	e.preventDefault();
	$(this).text("Please wait..");
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'renewPackage'
		},
		success: function (data) {
			//console.log(data);
			$("#btnRenwPackage").removeClass("d-inline").addClass("d-none");
			$("#closeRenewPackage").text("Close");
			//$(".renew_text").text(data);
			$(".renew_text").hide();
			$(".renew_text_msg").text(data).show();
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});
	$(this).text("Renew Now");

});

jQuery("#btnUpgradePackage").click(function (e) {
	e.preventDefault();
	$(this).text("Please wait..");
	var packageId = $(this).attr("data-packageid");
	$.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'upgradePackage',
			'UpgragePackageId': packageId
		},
		success: function (data) {
			//console.log(data);
			$("#btnUpgradePackage").removeClass("d-inline").addClass("d-none");
			$("#closeUpgradePackage").text("Close");
			//$(".upgrade_text").text(data);
			$(".upgrade_text").hide();
			$(".upgrade_text_msg").text(data).show();
		},
		error: function (err) {
			console.log('Error: '.data);
		}
	});
	$(this).text("Upgrade Now");

});
//jQuery("#ailments_list").bind("click", function(e)
/*
jQuery("#ailment_load_more").click(function (e) {
//jQuery('#ailments_list').on('click', '#ailment_load_more', function (e){
	e.preventDefault();
	var taxonomy = jQuery(this).data('taxonomy');
	var numposts = jQuery(this).data('numposts');
	var page = jQuery(this).attr('data-page');
	var filter = jQuery(this).attr('data-filter');
	var total = parseInt(numposts) * parseInt(page);
	//alert(toatal);
	$.ajax({
       	url: ajax_object.ajax_url,
	   	type: 'POST',
	   	data: {'action': 'getAilmentsData', 'taxonomy': taxonomy, 'page': page, 'numposts' : numposts, 'filter': filter},
	   	success: function (data) {
        	//console.log(data);
        	//$('#ailment_load_more').attr('data-page', parseInt(page) + 1);
        	//return;	
        	var result = JSON.parse(data);
        	//console.log(result.length);
        	var html = '';
            for (var i = 0; i < result.length; i++) 
            {
                item = result[i];  
                if(item['hide_load_more'] != 'true')
                {
	                html += "<div class='col-6 mt-4'><div class='connect-healer-circle'><div class='inner-healer-circle'><img src='" + item['image_url'] + "' alt=''></div></div><div class='txt-wrap mt-3'><h5><a href='https://thriive.noesis.tech/ailment/migrane'>" + item['name'] + "</a></h5><a href='" + item['link'] + "' class='btn btn-primary'>KNOW MORE</a></div></div>";
                }
                else
                {
	                $("#ailment_load_more").hide();
                }
            }
            $('#ailments_list').html(html);
            $('#ailment_load_more').attr('data-page', parseInt(page) + 1);
            //alert('Total:' + total + ' --- Result: ' + result.length);  
       	},
	   	complete: function (data) {},
	   	error: function (err) {}
   	});
});
*/

function filter_event() {
	var event_location = jQuery("#location-list").val();
	var event_date = jQuery('#month-list').val();
	jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'POST',
		data: {
			'action': 'filterEvents',
			'event_location': event_location,
			'event_date': event_date
		},
		success: function (data) {
			jQuery('#event-post').html(data);
		},
	});
}



function new_map($el) {
	var $markers = $el.find('.marker');
	var args = {
		zoom: 16,
		center: new google.maps.LatLng(0, 0),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	// create map	        	
	var map = new google.maps.Map($el[0], args);

	// add a markers reference
	map.markers = [];

	// add markers
	$markers.each(function () {
		add_marker($(this), map);
	});

	// center map
	center_map(map);

	// return
	return map;

}

/* This function will add a marker to the selected Google Map */

function add_marker($marker, map) {

	// var
	var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

	// create marker
	var marker = new google.maps.Marker({
		position: latlng,
		map: map
	});

	// add to array
	map.markers.push(marker);

	// if marker contains HTML, add it to an infoWindow
	if ($marker.html()) {

		// create info window
		var infowindow = new google.maps.InfoWindow({
			content: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function () {
			infowindow.open(map, marker);
		});
	}
}

/*  This function will center the map, showing all markers attached to this map */

function center_map(map) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each(map.markers, function (i, marker) {
		var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
		bounds.extend(latlng);
	});

	// only 1 marker?
	if (map.markers.length == 1) {

		// set center of map
		map.setCenter(bounds.getCenter());
		map.setZoom(16);
	} else {

		// fit to bounds
		map.fitBounds(bounds);
	}
}


jQuery("#btn_cancel").click(function (e) {
	$("#add_video_model").modal('hide');
});

jQuery("#btn_add_video").click(function (e) {
	$("#add_video_model").modal();
});

$(".enable_on_load_complete").css({
	"opacity": "0",
	"pointer-events": "none"
});
$(window).on('load', function () {
	setTimeout(function () {
		$(".enable_on_load_complete").css({
			"opacity": "",
			"pointer-events": ""
		});
	}, 2000);
});
setTimeout(function()
{
	$(".disable_on_load").removeAttr('disabled');
}, 2000);

//exclude services from universal AddToAny Share 
var a2a_config = a2a_config || {};
a2a_config.exclude_services = ["whatsapp", "facebook", "twitter", "linkedin", "email"];

function countryState(param, countryID) {
	if (countryID) {
		jQuery.ajax({
			type: 'POST',
			url: ajax_object.ajax_url,
			data: {
				'action': 'countryStateChange',
				'country_id': countryID
			},
			success: function (html) {
				//console.log('ok');
				if (param == 'register') {

					jQuery('.regsiter-form-section #state').attr('disabled', false);
					jQuery('.regsiter-form-section #state').html(html);
				}
				if (param == 'event') {
					jQuery('#create_event #state').attr('disabled', false);
					jQuery('#create_event #state').html(html);
				}

				//jQuery('.regsiter-form-section #city').html('<option value="">Select state first</option>'); 
			},
			error: function (e) {
				console.log(e);
			}
		});
	} else {
		if (param == 'register') {
			jQuery('.regsiter-form-section #state').html('<option value="">Select country first</option>');
			jQuery('.regsiter-form-section #city').html('<option value="">Select state first</option>');
		}
		if (param == 'event') {
			jQuery('#create_event #state').html('<option value="">Select country first</option>');
			jQuery('#create_event #city').html('<option value="">Select state first</option>');
		}

	}
}

function stateCity(param, stateID) {
	if (stateID) {
		jQuery.ajax({
			type: 'POST',
			url: ajax_object.ajax_url,
			data: {
				'action': 'stateCityChange',
				'state_id': stateID
			},
			success: function (html) {
				if (param == 'register') {
					jQuery('.regsiter-form-section #city').attr('disabled', false);
					jQuery('.regsiter-form-section #city').html(html);
				}
				if (param == 'event') {
					jQuery('#create_event #city').attr('disabled', false);
					jQuery('#create_event #city').html(html);
				}

				//jQuery('.regsiter-form-section #city').html('<option value="">Select state first</option>'); 
			},
			error: function (e) {
				console.log(e);
			}
		});
	} else {
		if (param == 'register') {
			jQuery('.regsiter-form-section #city').html('<option value="">Select state first</option>');
		}
		if (param == 'event') {
			jQuery('#create_event #city').html('<option value="">Select state first</option>');
		}

	}
}

function recaptchaCallback() {
        document.getElementById('reCaptchaField').value = 'nonEmpty';
}

/*
function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else { 
		x.innerHTML = "Geolocation is not supported by this browser.";
	}
}
	
function showPosition(position) {
	var latitude = position.coords.latitude 
	var longitude = position.coords.longitude;
	var d = new Date();
	var date = d.getDate() + '/' + (d.getMonth('')+1) + '/' + d.getFullYear();
	var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds(); 
	console.log(date);
}
*/

$('#txtArea').typeahead({
	minLength: 3,
    source: function (query, result) {
    	$.ajax({
		   	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'get_therapist_area', 'area': query},
		   	success: function (data) 
		   	{
		   		$("#resultdropdown").show();
		   		var listpop = "";
		    	$($.parseJSON(data)).map(function (key, val) {
		    		var select = 'selectArea("'+val+'")';
				    listpop += "<li onClick='"+select+"'>"+val+"</li>";
				});
				$('#resultdropdown').html(listpop);
				$('#resultdropdown').css('border', '1px solid #ced4da');
		   	},
		   	complete: function (data) {},
		   	error: function (err) {}
		});
    }
});

function selectArea(val) {
	$("#txtArea").val(val);
	$("#resultdropdown").hide();
}

$('#searchArea').typeahead({
	minLength: 3,
    source: function (query, result) {
    	$.ajax({
		   	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'get_therapist_area', 'area': query},
		   	success: function (data) 
		   	{
		   		$("#resultsearch").show();
		   		var listpop = "";
		    	$($.parseJSON(data)).map(function (key, val) {
		    		var select = 'selectAreaTop("'+val+'")';
				    listpop += "<li onClick='"+select+"'>"+val+"</li>";
				});
				$('#resultsearch').html(listpop);
				$('#resultsearch').css('border', '1px solid #ced4da');
		   	},
		   	complete: function (data) {},
		   	error: function (err) {}
		});
    }
});

function selectAreaTop(val) {
	$("#searchArea").val(val);
	$("#resultsearch").hide();
	var url = '/therapist';
	$.ajax({
	   	url: ajax_object.ajax_url,
	   	type: 'POST',
	   	data: {'action': 'save_area_session', 'area': val},
	   	success: function (data) 
	   	{
	   		var obj = JSON.parse(data);
	   		param = updateQueryStringParameter(url, 'area', obj.area);
			//param += "&latitude="+obj.lat+"&longitude="+obj.lng;
			window.location.href = param;
	   	},
	   	complete: function (data) {},
	   	error: function (err) {}
	});
}

$('#mobile-number').on('onmouseout'),function(e){
	if(!int_number.isValidNumber()){
		$("#error_msg").html("Invalid Number");
		return false;
    }
}

$('#call_seeker_signup_btn').on('submit', function (e) {
	e.preventDefault();
	e.stopPropagation();

	if ($(this).parsley('isValid')) {
		$("#error_msg").html("");
		var country_code = $('.iti__country.iti__active').attr('data-dial-code');
		var trimStr = $("#mobile-number").val();
		var trimStr = trimStr.replace(/\s/g, '');
		var mobileNumber = trimStr.replace('+' + country_code, '');
		var email = $('#email-id').val();
		jQuery.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'call_seeker_signup', 'mobile_number': mobileNumber, 'country_code': country_code, 'email': email},
	       	success: function (data) {
	       		try {
			        var jsonObj = JSON.parse(data);
			        if(jsonObj.success == 'error'){
				        $("#error_msg").text(jsonObj.resMessage);
			        } else {
				      	if(jsonObj.resStatus=='success'){
				      	gtag('event', 'click', {
							event_category: 'button',
							event_label: 'call signup started',
						});
						var str = jsonObj.resData;
						var res = str.split("-");
					      $("#error_msg").text("");
						  $("#error_msg").text(jsonObj.resMessage);
						  $("#otp_msg").text(jsonObj.resMessage);
						  $("#user_id").val(res[0]);
						  $("#mobile_number").val(res[2]);
						  $("#country_code").val(res[1]);
						  $("#event_name").val("call signup completed");
						  $("#reg_hide").css("display", "none");
						  $("#reg_unhide").css("display", "block");
				       	} else {
					     	$("#error_msg").text(jsonObj.resMessage);  
				       	}
					}
				} catch (err) {
					console.log('err. :  ' + err);
				}
	       	}
       	});
	}
});

$('#oc_call_seeker_signup_btn').on('submit', function (e) {
	e.preventDefault();
	e.stopPropagation();

	if ($(this).parsley('isValid')) {
		$("#error_msg").html("");
		var country_code = $('.iti__country.iti__active').attr('data-dial-code');
		var trimStr = $("#mobile-number").val();
		var trimStr = trimStr.replace(/\s/g, '');
		var mobileNumber = trimStr.replace('+' + country_code, '');
		var email = $('#email-id').val();
		jQuery.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'oc_call_seeker_signup', 'mobile_number': mobileNumber, 'country_code': country_code, 'email': email},
	       	success: function (data) {
	       		try {
			        var jsonObj = JSON.parse(data);
			        if(jsonObj.success == 'error'){
				        $("#error_msg").text(jsonObj.resMessage);
			        } else {
				      	if(jsonObj.resStatus=='success'){
				      	gtag('event', 'click', {
							event_category: 'button',
							event_label: 'oc call signup started',
						});
						var str = jsonObj.resData;
						var res = str.split("-");
					      $("#error_msg").text("");
						  $("#error_msg").text(jsonObj.resMessage);
						  $("#otp_msg").text(jsonObj.resMessage);
						  $("#user_id").val(res[0]);
						  $("#mobile_number").val(res[2]);
						  $("#country_code").val(res[1]);
						  $("#event_name").val("oc call signup completed");
						  $("#reg_hide").css("display", "none");
						  $("#reg_unhide").css("display", "block");
				       	} else {
					     	$("#error_msg").text(jsonObj.resMessage);  
				       	}
					}
				} catch (err) {
					console.log('err. :  ' + err);
				}
	       	}
       	});
	}
});

$('#seeker_submit').on('submit', function (e) {
	e.preventDefault();
	e.stopPropagation();

	if ($(this).parsley('isValid')) {
		$("#error_msg").html("");
		var country_code = $('.iti__country.iti__active').attr('data-dial-code');
		var trimStr = $("#mobile-number").val();
		var trimStr = trimStr.replace(/\s/g, '');
		var mobileNumber = trimStr.replace('+' + country_code, '');
		var fullname = $('#firstname').val();
		var email = $('#email').val();
		var pwd = $('#pwd').val(); 
		jQuery.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'seeker_signup', 'mobile_number': mobileNumber, 'country_code': country_code, 'fullname': fullname, 'email': email, 'pwd': pwd},
	       	success: function (data) {
	       		try {
			        var jsonObj = JSON.parse(data);
			        if(jsonObj.success == 'error'){
				        $("#error_msg").text(jsonObj.resMessage);
			        } else {
				      	if(jsonObj.resStatus=='success'){
				      		gtag('event', 'click', {
								event_category: 'button',
								event_label: 'seeker signup started',
							});
					      $("#error_msg").text("");
						  $("#error_msg").text(jsonObj.resMessage);
						  $("#user_id").val(jsonObj.resData);
						  $("#event_name").val("seeker signup completed");
						  $("#otp_field").css("display", "block");
						  $('#mobile-otp').attr('required', 'required');
						  $("#firstname").attr("disabled","disabled");
						  $("#email").attr( "disabled", "disabled" );
						  $("#pwd").attr( "disabled", "disabled" );
						  $("#mobile-number").attr( "disabled", "disabled" );
						  $("#ss_btn").css("display", "none");
						  $("#vs_btn").css("display", "block");
				       	} else {
					     	$("#error_msg").text(jsonObj.resMessage);  
				       	}
					}
				} catch (err) {
					console.log('err. :  ' + err);
				}
	       	}
       	});
	}
});
$('#verify_mobile').on('click', function (e) {
	e.preventDefault();
	e.stopPropagation();
	if ($(this).parsley().validate()) {
		var event_name = $("#event_name").val();
		var payment = $("#payment").val();
		var slug = $("#slug").val();
		var action = $("#action").val();
		var therapy = $("#therapy").val();
		var otp = $('#mobile-otp').val();
		var user_id = $('#user_id').val(); 
		jQuery.ajax({
	       	url: ajax_object.ajax_url,
	       	type: 'POST',
	       	data: {'action': 'verify_user', 'otp': otp, 'user_id': user_id},
	       	success: function (data) {
	       		try {
			        var jsonObj = JSON.parse(data);
			        if(jsonObj.success == 'error'){
				        $("#error_msg_otp").text(jsonObj.resMessage);
			        } else {
				      	if(jsonObj.resStatus=='success'){
				      		gtag('event', 'click', {
								event_category: 'button',
								event_label: event_name,
							});
					      $("#error_msg_otp").text("");
						  $("#error_msg_otp").text(jsonObj.resMessage);
						  if(payment){
						  	window.location.replace(window.location.protocol + "//" + window.location.host + "/payment-details?q="+slug+"&a="+action+"&t="+therapy); 
						  } else {
						  	location.reload(true);
						  }
				       	} else {
					     	$("#error_msg_otp").text(jsonObj.resMessage);  
				       	}
					}
				} catch (err) {
					console.log('err. :  ' + err);
				}
	       	}
       	});
	}

});
$('#txtAilment').typeahead({
	minLength: 3,
    source: function (query, result) {
    	$.ajax({
		   	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'getAilmentByAjax', 'issue': query},
		   	success: function (data) 
		   	{
		   		$("#resultailment").show();
		   		var listpop = "";
		    	$($.parseJSON(data)).map(function (key, val) {
		    		var select = 'selectAilment("'+val.name+'")';
				    listpop += "<li onClick='"+select+"'>"+val.name+"</li>";
				});
				$('#resultailment').html(listpop);
				$('#resultailment').css('border', '1px solid #ced4da');
		   	},
		   	complete: function (data) {},
		   	error: function (err) {}
		});
    }
});

function selectAilment(val) {
	$("#txtAilment").val(val);
	$("#resultailment").hide();
}

//home page Js ################

//home_page JS For FAQ
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
//home_page JS For testimonual
$(document).ready(function () {
	$('#cover-spin').hide(0);
    $('.testmonual_fetch').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
            }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
            }]
    });
});
//home_page JS For Slider_Content
$(document).ready(function () {
    $('.slider_content').slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
            }, {
            breakpoint: 520,
            settings: {
                infinite: false,
                slidesToShow: 2.3,
                slidesToScroll: 2,
            }
            }]
    });
});
//home_page JS For Blogs_Video
$(document).ready(function () {
    $('.blogs_video').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
            }, {
            breakpoint: 520,
            settings: {
                infinite: false,
                slidesToShow: 1.1,
                slidesToScroll: 1,
            }
            }]
    });
});
//home_page JS For Blogs
$(document).ready(function () {
    $('.blogs').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: false,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
            }, {
            breakpoint: 520,
            settings: {
                infinite: false,
                slidesToShow: 2.2,
                slidesToScroll: 2,
            }
            }]
    });
});
$(document).ready(function(){ 
    $('form').find("input[type=search]").each(function(ev)
    {
    	$(this).attr("placeholder", "Search therapy, issues , therapist....");
        $("input[type=search").css("font-size", 14);
        $("input[type=search").css("opacity", .6);
    });
});
$(".user_review").click(function(e){
	e.preventDefault();
	var caller_id = $("input[name=caller_id]").val();
	var receiver_id = $(this).attr('id');
	var rate = $("input[name='rate']:checked").val();
	var review = $("#review_"+receiver_id).val();
	if(rate != "" && review != ""){
		$.ajax({  
	    	url: ajax_object.ajax_url,
		   	type: 'POST',
		   	data: {'action': 'surByTherapist','caller_id':caller_id,'receiver_id':receiver_id,'rate':rate,'review':review},  
	    	success:function(data){  
	    		$('#msg_'+receiver_id).html("");
	     		$('#msg_'+receiver_id).html("Review and Rating saved!");
	     		$('#msg_'+receiver_id).css('color','green');
	     		location.reload(true);
	    	}  
		});
	} else {
		$('#msg_'+receiver_id).html("Please enter rating.")
		$('#msg_'+receiver_id).css('color','red');
	}
});
$('.menu-item').on('click',function(){
	gtag('event', 'click', {
		event_category: 'menu',
		event_label: $(this).text(),
	});
});
$('.log-wrapper').on('click',function(){
	var pathname = window.location.pathname;
	gtag('event', 'click', {
		event_category: pathname,
		event_label: $(this).text(),
	});
});
$(document).ready(function(){
	$(document).on("keyup",".search_issues",function(){ 
		var id = $(this).attr('id');
        // Search text
	   	var text = $('#'+id).val().toLowerCase();
	   	// Hide all content class element
	   	$('#'+id).parents('.issue_box').find('.therapy_issues').hide();

	   	// Search 
	   	$('#'+id).parents('.issue_box').find('.therapy_issues .label_issues').each(function(){
	   		if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
	    		$(this).closest('.therapy_issues').show();
	    	}
	  	});
    });
});
//var selIssueArr = [];
function selectIssueTag(name,slug,id){
	var nname = name.replace("*","'");
	//$("#sel_issue_"+id+" .therapy_issues #input_"+slug).prop("disabled",true);
	// selIssueArr.push($("#sel_issue_"+id+" .therapy_issues #input_"+slug+":disabled").val());
	// console.log(selIssueArr);
	// $('#issue_'+id).val(selIssueArr);
	$("#sel_issue_"+id+" .therapy_issues #input_"+slug).attr('onclick', 'removeIssueTag("'+name+'","'+slug+'", '+id+');');
	html = "<div class='issue_tag' id='tag_"+slug+"'>"+nname+"<span style='padding-left: 5px; cursor: pointer;' onClick=\"removeIssueTag('"+name+"','"+slug+"','"+id+"');\">x</span></div>";
	$("#selected_issues_"+id).append(html);
}
function removeIssueTag(name,slug,id){
	//$("#sel_issue_"+id+" .therapy_issues #input_"+slug).prop("disabled",false);
	$("#sel_issue_"+id+" .therapy_issues #input_"+slug).prop("checked", false);
	$("#sel_issue_"+id+" .therapy_issues #input_"+slug).attr('onclick', 'selectIssueTag("'+name+'","'+slug+'", '+id+');');
	$("#selected_issues_"+id+" #tag_"+slug).remove();
}
$('#add_issues').on("click", function(e){  
	e.preventDefault();  
	var mobile = $('#mobile').val();
	$.ajax({  
    	url: ajax_object.ajax_url,
	   	type: 'POST',
	   	data: {'action': 'addIssuesByTherapist', 'mobile':mobile},  
    	success:function(data){  
    		$('#hide_text').css('display','none');
    		$('#hide_mob').css('display','none');
    		data = $.parseJSON(data);
     		$('#dis_html').html(data.resData);
    	}  
	});
}); 