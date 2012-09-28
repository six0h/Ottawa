/*///////////////*/
/*
/* AUTHOR:	Cody Halovich (cody at telenova dot ca)
/* CLIENT:	Chillspace Print. Web. IT. for Think! Social Media
/* PROJECT:	Taste Montreal Facebook App
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
		newCurrent = 0,
		nextIndex = 0,
		page_tab = 'https://apps3.ionflo.com/montreal/facebook/',
		channel = '//apps3.ionflo.com/montreal/facebook/channel.html',
		app_id = '446635325389000',
		user_email = '';

	// MAKE PAGES SLIDE AUTOMAGICALLY
//	setInterval(nextPage, 5000);

	// ANIMATE TO NEXT PAGE
	function nextPage(callback) {

		var	currentPage = pages.eq(newCurrent),
			nextNum = newCurrent >= pages.length-1 ? 0 : newCurrent+1,
			nextPage = pages.eq(nextNum),
			i = 0;

		// HIDE SPANS ON NEXT PAGE
//		nextPage.find('span,ul').css('left', '+=810px');
		
		// WIPE CURRENT SPANS OFF SCREEN
		currentPage.find('span,ul').each(function() {
			// ANIMATE, THEN REMOVE JQUERY STYLES
//			$(this).stop().delay(i).animate({left: '+=20px'}, 'easeOutSine').animate({left: '-=830px'}, 'easeOutSine', function() {$(this).removeAttr('style') });
//			i = i+200;
		});

		// WIPE PAGE OFF SCREEN
		currentPage.delay('0').animate({left: '+=100px'}, 'easeOutSine').animate({left: '-910px'}, 'easeOutSine', function() {
			$(this).css({left: '810px'}).find('span,ul').removeAttr('style');
		});

		// WIPE IN NEW PAGE
		var c=0;
		nextPage.delay('0').animate({left: '+=100px'}).animate({left: '-=940px'}, 'easeOutSine').animate({left: '+=30px'}).find('span,ul').each(function() {
i//			$(this).delay(c).animate({left: '-=840px'}).animate({left: '+=30px'});
			c=c+0;
		});

		// SET CURRENT TO NEXT SLIDE
		newCurrent = nextNum;

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
		      xfbml      : true  // parse XFBML
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

/*///////////////////////////////////////////////
/*///////////////////////////////////////////////
// UNO UNO UNO UNO
/*///////////////////////////////////////////////
/*///////////////////////////////////////////////

	// UNO BTN
	$('.enterbtn a').click(function() {
		nextPage(function() {});
		return false; 
	});


/*///////////////////////////////////////////////
/*///////////////////////////////////////////////
// DOS DOS DOS DOS
/*///////////////////////////////////////////////
/*///////////////////////////////////////////////

	// VALIDATOR OPTIONS FOR DOS FORM
        var validOptions = {
                rules: {
                        first_name: "required",
                        last_name: "required",
                        email: {
                                required: true,
                                email: true
                        },
			province: "required",
			country: "required",
                        terms: "required"
                },

                messages: {
                        first_name: "Please provide your first name.",
                        last_name: "Please provide your last name.",
                        email: {
                                required: "Please provide your email address.",
                                email: "Please provide a valid email address."
                        },
			province: "Please provide your Province/State",
			country: "Please provide your Country",
                        terms: "Please check the box to acknowledge you have read the terms and conditions and agree to them."
                },

		errorLabelContainer: '.error-wrapper',
		wrapper: 'li',

		submitHandler: function(form) {
			// HIJACK DOS FORM AND SUBMIT THROUGH AJAX
			$(form).ajaxSubmit({
				dataType: 'json',
				url: 'ajax/addentry.php',
				type: 'POST',
				success: function(res) {

					if(res.status == 'success') {
						$('#blog_email').val(res.email);
						nextPage(function() {});
					} else if (res.status == 'fail') {
						alert(res.errors[0]);
					} else if (res.status == 'alreadyentered') {
						$('#blog_email').val(res.email);
						alert(res.errors[0]);
						nextPage();
					}

				}
			});
		}
        };

        // FORM DOES NOT PASS GO UNLESS IT VALIDATES
        $('#contest_form').validate(validOptions);

	$('.fancybox').fancybox({
		'height': '500px',
		'minHeight': '250px'
	});

/*///////////////////////////////////////////////
/*///////////////////////////////////////////////
// TRES TRES TRES TRES
/*///////////////////////////////////////////////
/*///////////////////////////////////////////////

	var	slides = $('#slides li'),
		nextSlide = 0,
		previousSlide = 0,
		sliderWidth = slides.length * 810;

	function genNum(slides) {
		var min = 1;
		var max = slides.length;
		
		var rand = Math.floor(Math.random() * (max - min + 1)) + min;
		slideNow = rand - 1;
		return slideNow;
	};

	function callSlide(numSlide, mycallback) {

		var	currentSlide = slides.eq(slideNow),
			minus,
			newCoord,
			currentLeft = slideNow*810,
			newLeft = numSlide*810;

		newCoord = '-' + newLeft + 'px';

		$('#slides').stop().animate({left: newCoord});

		$('#thumbnails li').removeClass('active');
		$('#thumbnails li').eq(numSlide).addClass('active');

		mycallback(numSlide);

	}

	var slideNow = genNum(slides);

	callSlide(slideNow, function(num) {
		$('#blogger').val(num);	
	});

	$('#thumbnails li').eq(slideNow).addClass('active');

	$('#slides').css({
		'width': sliderWidth,
		'overflow': 'hidden'
	});

	$('.left_arrow a').click(function() {
		var previousSlide = slideNow == 0 ? slides.length-1 : slideNow-1;
		callSlide(previousSlide,function() {
			$('#blogger').val(previousSlide);
		});
		slideNow = previousSlide;
		return false;
	});

	$('.right_arrow a').click(function() {
		var nextSlide = slideNow >= slides.length-1 ? 0 : slideNow+1;
		callSlide(nextSlide,function() {
			$('#blogger').val(nextSlide);
		});
		slideNow = nextSlide;
		return false;
	});

	$('#thumbnails li a').click(function() {
		var pushSlide = $(this).parent('li').prevAll().length;
		callSlide(pushSlide, function(res) {
			$('#blogger').val(pushSlide);
		});
		slideNow = pushSlide;
		return false;
	});

	$('#blogger_form').ajaxForm({
		dataType: 'json',
		url: 'ajax/selectblogger.php',
		type: 'POST',
		success: function(res) {
			var blogger_name;
			if(res.status == 'success') {
				switch(res.blogger) {
					case '0':

						blogger_name = 'Lauren DeSantis';
				
					break;

					case '1':

						blogger_name = 'Darlene Horn';

					break;

					case '2':

						blogger_name = 'Mardi Michaels';

					break;

					case '3':

						blogger_name = 'Mijune Pak';

					break;

					case '4':

						blogger_name = 'Meghan Mallory';

					break;

				}


				$('#chosen_blogger').val(blogger_name);
				nextPage();
			} else if (res.status == 'fail') {
				alert(res.errors[0]);
			}

		}
	});

/*///////////////////////////////////////////////
/*///////////////////////////////////////////////
// QUATTRO QUATTRO QUATTRO QUATTRO
/*///////////////////////////////////////////////
/*///////////////////////////////////////////////

	$('.facebook').click(function() {

		var chosen_blogger = $('#chosen_blogger').val();

		var wallOptions = {
			method: 	'feed',
			link: 		'https://apps.facebook.com/tastemontreal/',
			name: 		'Win a trip for 2 to Montreal!',
			description:	"I want to win a trip to Montreal's Restaurant Week. I've invited my favourite food blogger, "+chosen_blogger+", to dine with me. Send your own invitation now!",
			caption:	'Who will you invite to Montreal with you?',
			picture:	'https://apps3.ionflo.com/montreal/facebook/img/tastemontreal.jpg'
		};

		FB.ui(wallOptions, function() {});

	});

	$('.twitter').click(function() {
		var message = encodeURIComponent("I want to win a trip to TASTE MTL. I've invited my favourite food blogger to dine with me. Send your invite now: http://bit.ly/QUSTom");
		window.open('http://twitter.com/home?status='+message);
	});

});

