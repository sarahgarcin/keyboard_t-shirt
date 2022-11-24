<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Keyboard Tee-shirt</title>
	<link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<main>
		<!-- svg used to draw the tee-shirt -->
		<svg height="0" width="0">
			<clipPath id="clip">
			  <path id="path3721" d="M 0,66.235125 176.62703,2.9109729e-5 h 22.07838 c 0,0 20.94356,34.541183890271 44.15674,44.156763890271 23.21323,9.615563 65.10033,9.615563 88.31353,0 C 354.3889,34.541213 375.3324,2.9109729e-5 375.3324,2.9109729e-5 L 397.4108,0 574.03787,66.235125 551.95951,176.62709 h -88.3136 V 485.72411 H 110.39189 V 176.62709 H 22.078386 Z" clippath="">
				</path>
			</clipPath>
		</svg>


		<div class="teeshirt">
			<?php 
				// display errors 
				error_reporting(E_ALL);
				// include utils.php with php functions to list the files in folder
				@include "libs/utils.php";
				// include Parsedown.php to convert markdown to html in text files
				@include 'libs/Parsedown.php'; 
  			$Parsedown = new Parsedown();
  			// set the media folder name here
  			$dir = "medias";
  			// add all medias from "medias" directory in $mediaslist array
				$mediaslist = getFileList($dir);
				// randomize order of medias
				shuffle($mediaslist);
				// add html list 
				echo "<ul class='medias-list'>";
					// loop throught each media from "medias" directory
					foreach($mediaslist as $file){
						// check for the extension of the file to detect the type of media
						$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
						// if the media is an image, display it as image in html
						if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg' || $ext == 'JPG'){
							// get a clean filename
							$fileName = str_replace($dir . '/', '', $file['name']);
							// get the file path
				  		$filePath = $file['name'];
				  		// add the image in html in the list
				  		echo "<li class='image'>";
					  	echo "<figure class='{$fileName}'>";
					  	echo "<img src='{$filePath}'/>";
					  	echo "</figure>";
					  	echo "</li>";
						}
						// if the media is text, display it as text in html
						if($ext == 'txt'){
							// get file content 
							$content = file_get_contents($file['name']);
							// add the text in html in the list
							echo "<li class='text'>";
								// convert the markdown content to html
								echo $Parsedown->text($content);
							echo "</li>";
						}
					}
				 echo "</ul>";
		  
			?>
		</div>

	</main>

	<!-- include the jquery and javascript files -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>

</body>
</html>