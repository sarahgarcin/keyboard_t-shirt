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
	<main class="back">
		<!-- svg used to draw the tee-shirt -->
		<svg height="0" width="0">
			<clipPath id="clip">
			  <path id="path3721" d="M0,66.235L176.627,0h22.078c0,0,20.943-3.561,44.157,6.054c23.213,9.616,65.1,9.616,88.312,0 C354.389-3.561,375.332,0,375.332,0h22.078l176.627,66.234l-22.078,110.393h-88.313v309.097H110.392V176.627H22.078L0,66.235z" clippath="">
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
  			$dir = "medias-back";
  			// add all medias from "medias" directory in $mediaslist array
				$mediaslist = getFileList($dir);
				// add html list 
				echo "<ul class='medias-list'>";
					// loop throught each media from "medias" directory
					foreach($mediaslist as $file){
						// check for the extension of the file to detect the type of media
						$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
						// if the media is an image, display it as image in html
						if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg' || $ext == 'JPG'){
							// get a clean filename
							$fileName = str_replace($dir.'/', '', $file['name']);
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