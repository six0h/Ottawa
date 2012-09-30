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
		page_tab = 'https://home.codyhalovich.com/ottawa/www/home.php',
		channel = '//home.codyhalovich.com/ottawa/www/channel.html',
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
                        terms: "required",
			agree: "required"
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
                        terms: "Please check the box to acknowledge you have read the terms and conditions and agree to them.",
			agree: "Please agree to the terms and conditions"
                },

		errorPlacement: function(error, element) {
			error.appendTo( element.parent('li') );
		},
		wrapper: 'span',
		onkeyup: false,

		submitHandler: function(form) {
			// HIJACK DOS FORM AND SUBMIT THROUGH AJAX
			$(form).ajaxSubmit({
				dataType: 'json',
				success: function(res) {
					if(res.status == 200) {
						callPage('thanks');
					} else if (res.status == 500) {
						console.log(error);
						alert("There was a server error. Please try again.");
					} else if (res.status == 502) {
						var output = "You have already uploaded this file. Please submit again to confirm that you would like to overwrite it.";
						alert(output);
						$('.confirm').val('true');
					}
				},

				error: function(res) {
					alert('error');
				}
			});
		}

	};

	$('#photo_form,#video_form,#music_form').validate(validOptions);

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

