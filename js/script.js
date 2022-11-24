// define useful variables
var imageHeight = 300;
var randomHeight;

// when a key is pressed
$(document).keydown(function(e) {
	// display the code of the key in the console
	console.log(e.which);
  switch(e.which) {
  	// if the key pressed code is 65 that mean "A"
    case 65: // "A" keypress == random order
    // reload the page and change the order of medias
    location.reload();
    break;

    // if the key pressed code is 90 that mean "Z"
    case 90: // "Z" keypress = random height
    	// generate a random number between 10 and 400
    	var randomHeight = getRandomInt(10, 400);
    	// change the height of images with the random number
    	$('.medias-list img').css('max-height', randomHeight + "px");
    break;

    // if the key press code is 89 that mean "Y"
    case 89: // "Y" keypress = change height
    	// if a random height has been generated, set the image height to this number
    	if(randomHeight != undefined ){
    		imageHeight = randomHeight;
    	}
    	// increase the image height number by 20px each time the key is pressed
    	imageHeight = imageHeight + 20;
    	// if the image height is smaller than 400px, continue to inscrease the height and change the height 
    	if(imageHeight < 400){
    		$('.medias-list img').css('max-height', imageHeight + "px");
    	}
    	//  else go back to 0, and start over
    	else{
    		imageHeight = 0;
    	}
    	
    break;

    // if the key pressed code is 69 that mean "E"
    case 69: // "E" keypress = monochrome
    	// generate a random color 
    	var randomColor = getRandomColor();
    	// change the tee-shirt background with the random color
    	$('.teeshirt').css('background', randomColor);
    	// create monotone images in css
    	$('.medias-list img').css({
    		  "mix-blend-mode": "screen",
				  "-webkit-filter": "grayscale(100%)",
				  "filter": "grayscale(100%)",
				  "opacity": "1"
    	});

    break;

    default: 
    break; // exit this handler for other keys
  }
});

	
// function to get a random color 
function getRandomColor(){
	return '#'+ ('000000' + Math.floor(Math.random()*16777215).toString(16)).slice(-6);
}

// function to get a random interger number 
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}