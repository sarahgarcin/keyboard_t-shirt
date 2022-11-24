# Keyboard t-shirt starter kit
The Keyboard t-shirt is a starter kit to create to create a small program in web language (PHP/CSS/JS) to design t-shirts only with keyboard interaction during the workshop of November 28 at the HfG Karlsruhe.

## Installation

### Dependencies
You need a local PHP server to run the program

#### On OSX and Linux
- Open the Terminal window 
- Drag and Drop the starter kit folder on the Terminal Icon to open it in the Terminal
- Type ```php -S localhost:8000``` then enter to run the server
- You should see something like : ```[Wed Nov 23 09:37:58 2022] PHP 7.4.32 Development Server (http://localhost:8080) started``
- Open a browser and type localhost:8000 in the url 

#### On Windows
- Install Visual Studio Code : https://code.visualstudio.com/
- Install the Live Server Extension for Visual Studio Code : https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer
- Open the starter kit in Visual Studio
- Click on the "Go Live" button at the bottom right


## Documentation

### Keyboard events
The starter kit has some functions include for demo. 
All functions are fired by a keypress. 
- A > Randomize medias order
- Z > Randomize medias size 
- Y > Change medias size step by step
- E > Randomize t-shirt color


### App architecture
- ```fonts``` : add woff and woff2 font files here 
- ```js```
  + ```jquery.min.js``` : jquery library file 
  + ```script.js```: contains exemple of keyboard interaction for designing the t-shirt. Add / Modify / Delete the functions to create your own program
- ```libs```
  + ```Parsedown.php```: PHP library to convert Markdown to HTML
  + ```utils.php```: PHP functions to read files in folder
- ```medias```: folder where the content is store, add images or text files here 
- ```index.php```: the main PHP page (Home page) - http://localhost:8080
- ```back.php```: page for the back of the t-shirt - http://localhost:8080/back.php
- ```custom.css```: write your custom css here
- ```interface.css```: the css for the program interface (do not modify it)



### Add / remove medias
- Open ```medias``` folder for the t-shirt front side and ```medias-back```for the t-shirt back side
- Add images or text files (.txt)
- The content should be written in markdown. 
- In this example the medias are displayed in a ramdom order, if it is not you can order your content by naming in alphabetical order (01-image.png, 02-image.png 03-text.txt, etc.)


### Markdown memo
```# Big Title (h1)```  
```## Sub Title (h2)```  
```### Sub Sub Title (h3)```  
```#### Sub Sub Sub Title (h4)```  
```#### Sub Sub Sub Sub Title (h5)```  
```**Bold**```  
```*Italic*```

### PHP functions 

#### getListFile(nameOfDirectory)
The getListFile() function list all the files in a specific directory 

##### Usage Examples 
Files structure example :
```
medias
- text.txt
- image.png
- youpi.png
```

PHP usage : 
```
$mediaslist = getListFile('medias');
echo "<ul class='medias-list'>";
// loop throught each media from "medias" directory
foreach($mediaslist as $file){
  // check for the extension of the file to detect the type of media
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  // if the media is an image, display it as image in html
  if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg' || $ext == 'JPG'){
    // get the file path
    $filePath = $file['name'];
    // add the image in html in the list
    echo "<li class='image'>";
    echo "<figure>";
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
```

#### getFolderList(nameOfDirectory)
The getFolderList() function list all the folders in a specific directory 

##### Usage Example
Files structure example :
```
medias
- dossier-1
  + text.txt
  + image.png
  + youpi.png
- dossier-2
  + text-test.txt
  + image-test.png
  + youhou.png
```

PHP usage :
```
// add all folders from "medias" directory in $folderlist array
$folderlist = getFolderList("medias");
// loop throught each folders from "medias" directory
foreach($folderlist as $folder){
  echo "<ul>";
  // add all medias from current folder in $filelist array
  $filelist = getFileList($folder);
  // loop throught each media from current folder
  foreach($filelist as $file){
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    // if the media is an image, display it as image in html
    if($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'jpeg' || $ext == 'JPG'){
      // get the file path
      $filePath = $file['name'];
      // add the image in html in the list
      echo "<li class='image'>";
      echo "<figure>";
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
}
```

### JS functions 

#### getRandomColor()
Use the getRandomColor() function to generate a random color in HEX
```
var randomColor = getRandomColor();
$('.teeshirt').css('background', randomColor);
```

#### getRandomInt(min, max)
Use the getRandomInt(min, max) function to generate a integer number between a min and a max number
```
var randomNumber = getRandomInt(10, 100);
$('.medias-list img').css('max-height', randomNumber + "px");
```

---

## License 
GPL v.3









