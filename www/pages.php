<div id="one" class="page active">
	<div class="file-type-choice">
		<span class="submit-header"></span> 
		<a href="#" class="photo-link">Photo</a>
		<a href="#" class="video-link">Video</a> 
		<a href="#" class="music-link">Music</a> 
	</div> 
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
				<label for="hometown">Hometown</label> 
				<input type="text" name="hometown"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism</label> 
				<input type="checkbox" name="news" CHECKED/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<ul>
			<li><p>Clips should be no longer than 15 seconds and preferably in high definition. Raw footage welcome, don't worry about editing.</p> </li>
			<li>
				<input type="checkbox" name="agree"/>
				<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label> 
			</li>
			<li>
				<input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
				<input type="file" name="clip" class="clip"/>
				<input type="submit" value="Submit" name="submit" class="submit" />
			</li>
		</ul> 
	</div> 
		<input type="hidden" name="type" value="photo"/>
		<input type="hidden" name="confirm" class="confirm" value="false"/>
		<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
		<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
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
				<label for="hometown">Hometown</label> 
				<input type="text" name="email"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism</label> 
				<input type="checkbox" name="news"/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<p>Clips should be no longer than 15 seconds and preferably in high definition. Raw footage welcome, don't worry about editing.</p> 
		<input type="checkbox" name="agree"/>
		<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label> 
		<input type="hidden" name="MAX_FILE_SIZE" value="104857600"/>
		<input type="file" name="clip" class="clip"/>
		<input type="submit" value="Submit" name="submit" class="submit" />
	</div> 
	<input type="hidden" name="type" value="video"/>
	<input type="hidden" name="confirm" class="confirm" value="false"/>
	<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
	<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
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
				<label for="hometown">Hometown</label> 
				<input type="text" name="email"/>
			</li>
			<li>
				<label for="province">Province</label> 
				<input type="text" name="province"/>
			</li>
			<li class="news-li">
				<label for="news">Yes, I am interested in hearing from Ottawa Tourism</label> 
				<input type="checkbox" name="news"/>
			</li>
		</ul> 
	</div>

	<div class="form-confirm">
		<p>Clips should be no longer than 15 seconds and preferably in high definition. Raw footage welcome, don't worry about editing.</p> 
		<input type="checkbox" name="agree"/>
		<label for="agree">I certify I have read the <a href="#rules" class="terms">Terms & Conditions</a> and that this clip was made by me and includes recordings of only me and/or my friends</label> 
		<input type="hidden" name="MAX_FILE_SIZE" value="26214400"/>
		<input type="file" name="clip" class="clip"/>
		<input type="submit" value="Submit" name="submit" class="submit" />
	</div> 
	<input type="hidden" name="type" value="music"/>
	<input type="hidden" name="confirm" class="confirm" value="false"/>
	<input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>"/>
	<input type="hidden" name="agent" value="<?=$_SERVER['HTTP_USER_AGENT'];?>"/>
	</form>
</div>

<div id="thanks" class="page">
	<a href="#" id="fb-share">Share on Facebook</a>
	<a href="#" id="twitter-share">Share on Twitter</a>
</div>
