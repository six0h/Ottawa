/*///////////////*/
/*
/* AUTHOR:	Cody Halovich (cody at telenova dot ca)
/* CLIENT:	Chillspace Print. Web. IT. for Think! Social Media
/* PROJECT:	Love Ottawa
/*
/* DO NOT EDIT THIS DOCUMENT OR ANY FILES RELATED TO THE PARENT PROJECT WITHOUT PERMISSION OF THE AUTHOR.
/*
/*///////////////*/

$(function() { // ENCAPSULATE EVERYTHING IN JQUERY, EVEN FUNCTIONS

/*///////////////////////////////////////////////
/*///////////////////////////////////////////////
// OK, LETS TAKE CARE OF GLOBAL STUFF FIRST
/*///////////////////////////////////////////////
/*///////////////////////////////////////////////


	// DEFINE GLOBALS
	var	pages = $('#page-wrapper>div'),
		page_tab = 'https://apps3.ionflo.com/ottawa/www/home.php',
		channel = '//apps3.ionflo.com/ottawa/www/channel.html',
		app_id = '368337929912122',
		user_email = '';

	$('.photo-link').click(function() {
		callPage('photo');
	});
	
	$('.video-link').click(function() {
		callPage('video');
	});

	$('.music-link').click(function() {
		callPage('music');
	});

	var validOptions = {
               
	        rules: {
                        first_name: "required",
                        last_name: "required",
                        email: {
                                required: true,
                                email: true
                        },
			hometown: "required",
			province: "required",
                        terms: "required"
                },

                messages: {
                        first_name: "Please provide your first name.",
                        last_name: "Please provide your last name.",
                        email: {
                                required: "Please provide your email address.",
                                email: "Please provide a valid email address."
                        },
			hometown: "Please tell us where you're from.",
			province: "Please let us know what province you live in.",
                        terms: "Please check the box to acknowledge you have read the terms and conditions and agree to them."
                },

		errorPlacement: '.error-wrapper',
		wrapper: 'li',

		submitHandler: function(form) {
			// HIJACK DOS FORM AND SUBMIT THROUGH AJAX
			$(form).ajaxSubmit({
				dataType: 'json',
				url: 'ajax/addentry.php',
				type: 'POST',
				success: function(res) {

					if(res.status == 'success') {
						callPage('thanks');
					} else if (res.status == 'fail') {
						alert(res.errors[0]);
					} else if (res.status == 'alreadyentered') {
						alert(res.errors[0]);
						callPage('thanks');
					}

				}
			});
		}

	};

	$('.user_form').validate(validOptions);

	function callPage(pageId) {
		$('.active').animate({'left':'50px'}).animate({'left':'-810px'},function() {
			$(this).css('left','810px').removeClass('active');
		});

		$('#' + pageId).animate({'left':'860px'}).animate({'left':'-50px'}).animate({'left':'0'}).addClass('active');
	}


	//INITIALIZE FACEBOOK
	fbInit();

	function fbInit() {
		  window.fbAsyncInit = function() {
		     
		     FB.init({
		      appId	 : app_id,	
		      channelUrl : channel, // Channel File
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      xfbml      : true,  // parse XFBML
		      oauth	 : true
		    });

		    // MAKE CANVAS AUTOGROW
		    FB.Canvas.setAutoGrow();

		    //MONITOR LIKE BUTTON FOR STATUS CHANGES, RELOAD ON CHANGE
		    FB.Event.subscribe('edge.create', function(response) {
				top.window.location.href = page_tab;
		    });
		    FB.Event.subscribe('edge.remove', function(response) {
				top.window.location.href = page_tab;
		    });
		  };

		  // Load the SDK Asynchronously
		  (function(d){
		     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "//connect.facebook.net/en_US/all.js";
		     ref.parentNode.insertBefore(js, ref);
		   }(document));

		

	}

});

