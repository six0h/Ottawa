<div id="one" class="page active">
	<div class="file-type-choice">
		<span class="submit-header"></span> 
		<a href="#" class="photo-link">Photo</a>
		<a href="#" class="video-link">Video</a> 
		<a href="#" class="music-link">Music</a> 
	</div> 
	<a href="#rules" class="terms">Terms & Conditions</a>
	<a href="#" id="ontario-link" target="_blank">Ontario</a>
	<a href="#" id="ottawa-link" target="_blank">Ottawa</a>
	<a class="fancy-video video-submitted" href="#demovideo">See what others have submitted</a>
	<a class="fancy-pic pic-submitted" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">See what others have submitted</a>
</div>

<div id="photo" class="page">
	<div class="file-type-choice">
		<span class="submit-header"></span> 
		<a href="#" class="photo-link">Photo</a>
		<a href="#" class="video-link">Video</a> 
		<a href="#" class="music-link">Music</a> 
	</div>

	<form method="POST" action="ajax/addentry.php" class="user_form" id="photo_form" enctype="multipart/form-data">
	<div class="form">
		<ul>
			<li>
				<label for="first_name">First Name</label> 
				<input type="text" name="first_name"/>
			</li>
			<li>
				<label for="last_name">Last Name</label> 
				<input type="text" name="last_name"/>
			</li>
			<li>
				<label for="email">Email</label> 
				<input type="text" name="email"/>
			</li>
			<li>
				<label for="city">City</label> 
				<input type="text" name="city"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li>
				<label for="postal_code">Postal Code</label> 
				<input type="text" name="postal_code"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism and Ontario Tourism</label> 
				<input type="checkbox" name="news"/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<ul>
			<li><p>Photos: Photos should be larger than 500kB and at least 1000px by 1000px. JPG preferred, but also TIFF and/or PSD will be accepted. Please no RAW/ARW/NEF.</p>
			</p>Max Filesize: 10MB</p> </li>
			<li>
				<input type="checkbox" name="agree"/>
				<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label> 
			</li>
			<li>
				<label for="clip_name" class="clip_label">Give your file a name</label>
				<input type="text" name="clip_name"><br />
				<label for="clip" class="clip_label">Upload a file..</label>
				<input type="file" name="clip" class="clip"/>
				<input type="submit" value="Submit" name="submit-photo" class="submit" />
			</li>
		</ul> 
	</div> 
		<input type="hidden" name="type" value="photo"/>
		<input type="hidden" name="confirm" class="confirm" value="false"/>
		<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
		<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
	<a href="#rules" class="terms">Terms & Conditions</a>
	<a href="#" id="ontario-link" target="_blank">Ontario</a>
	<a href="#" id="ottawa-link" target="_blank">Ottawa</a>
</div>

<div id="video" class="page">
	<div class="file-type-choice">
		<span class="submit-header"></span> 
		<a href="#" class="photo-link">Photo</a>
		<a href="#" class="video-link">Video</a> 
		<a href="#" class="music-link">Music</a> 
	</div>

	<form method="POST" action="ajax/addentry.php" class="user_form" id="video_form">
	<div class="form">
		<ul>
			<li>
				<label for="first_name">First Name</label> 
				<input type="text" name="first_name"/>
			</li>
			<li>
				<label for="last_name">Last Name</label> 
				<input type="text" name="last_name"/>
			</li>
			<li>
				<label for="email">Email</label> 
				<input type="text" name="email"/>
			</li>
			<li>
				<label for="city">City</label> 
				<input type="text" name="city"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li>
				<label for="postal_code">Postal Code</label> 
				<input type="text" name="postal_code"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism and Ontario Tourism</label> 
				<input type="checkbox" name="news"/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<p>Video: Clips should be about 15-30 seconds and preferably in high definition. Raw footage welcome; don't worry about editing. Export as "Web High Definition" if possible in your program.</p>
		<p>Max Filesize 100MB</p> 
		<input type="checkbox" name="agree"/>
		<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label>
		<br class="clear" />
		<label for="clip_name" class="clip_label">Give your file a name</label>
		<input type="text" name="clip_name"><br />
		<label for="clip" class="clip_label">Upload a file..</label>
		<input type="file" name="clip" class="clip"/>
		<input type="submit" value="Submit" name="submit-video" class="submit" />
	</div> 
	<input type="hidden" name="type" value="video"/>
	<input type="hidden" name="confirm" class="confirm" value="false"/>
	<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
	<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
	<a href="#rules" class="terms">Terms & Conditions</a>
	<a href="#" id="ontario-link" target="_blank">Ontario</a>
	<a href="#" id="ottawa-link" target="_blank">Ottawa</a>
</div>

<div id="music" class="page">
	<div class="file-type-choice">
		<span class="submit-header"></span> 
		<a href="#" class="photo-link">Photo</a>
		<a href="#" class="video-link">Video</a> 
		<a href="#" class="music-link">Music</a> 
	</div>

	<form method="POST" action="ajax/addentry.php" class="user_form" id="music_form">
	<div class="form">
		<ul>
			<li>
				<label for="first_name">First Name</label> 
				<input type="text" name="first_name"/>
			</li>
			<li>
				<label for="last_name">Last Name</label> 
				<input type="text" name="last_name"/>
			</li>
			<li>
				<label for="email">Email</label> 
				<input type="text" name="email"/>
			</li>
			<li>
				<label for="city">City</label> 
				<input type="text" name="city"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li>
				<label for="postal_code">Postal Code</label> 
				<input type="text" name="postal_code"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism and Ontario Tourism</label> 
				<input type="checkbox" name="news"/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<p>Sound: Music clips should be no more than a couple minutes. Lightly compresed formats preferred, or high quality MP3/AAC (320Kbps).
		<p>Max Filesize 25MB / A couple minutes in length. Original material only please.</p> 
		<input type="checkbox" name="agree"/>
		<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label> 
		<br class="clear" />
		<label for="clip_name" class="clip_label">Give your file a name</label>
		<input type="text" name="clip_name"><br />
		<label for="clip" class="clip_label">Upload a file..</label>
		<input type="file" name="clip" class="clip"/>
		<input type="submit" value="Submit" name="submit-music" class="submit" />
	</div> 
	<input type="hidden" name="type" value="music"/>
	<input type="hidden" name="confirm" class="confirm" value="false"/>
	<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
	<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
	<a href="#rules" class="terms">Terms & Conditions</a>
	<a href="#" id="ontario-link" target="_blank">Ontario</a>
	<a href="#" id="ottawa-link" target="_blank">Ottawa</a>
</div>

<div id="thanks" class="page">
	<a href="#" id="submit-more">Submit More</a>
	<a href="#" id="fb-share">Share on Facebook</a>
	<a href="#" id="twitter-share">Share on Twitter</a>
	<a href="#rules" class="terms">Terms & Conditions</a>
	<a href="#" id="ontario-link" target="_blank">Ontario</a>
	<a href="#" id="ottawa-link" target="_blank">Ottawa</a>
</div>

<div id="loading"></div>

<div class="hidden">
	<a class="fancy-pic" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">Hidden Link</a>
	<a class="fancy-pic" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">Hidden Link</a>
	<a class="fancy-pic" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">Hidden Link</a>
	<a class="fancy-pic" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">Hidden Link</a>
	<a class="fancy-pic" href="https://ottawa.s3.amazonaws.com/haveone%40test.com-moretests.png" rel="group">Hidden Link</a>
</div>


<script type="text/javascript">

// SETUP VIDEO PLAYER
$(function() {

	$('.fancy-pic').fancybox();

	$('.fancy-video').fancybox({
		'content':'<div id="mediaspace"></div>',
		autoSize: false,
		height: 300,
		fitToView: true,
		afterShow: function() {
			if(this.href == '#demovideo') {
				jwplayer('mediaspace').setup({
					flashplayer: "js/player.swf",
					file: "uploads/videos/demo.mp4",
					width: '100%'
				});
			}
		}
	});

});

</script>
