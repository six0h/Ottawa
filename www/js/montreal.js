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
		newCurrent = 0,
		nextIndex = 0,
		page_tab = 'https://apps3.ionflo.com/ottawa/www/home.php',
		channel = '//apps3.ionflo.com/ottawa/www/channel.html',
		app_id = '368337929912122',
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

