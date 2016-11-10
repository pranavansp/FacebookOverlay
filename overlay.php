<?php 
	require( __DIR__.'/facebook_start.php' );
	$bg_path = 'images/bg1.jpg';
	$token = $_SESSION['facebook_access_token'];

	$output = curly($token);
	echo $output;
	$r=json_decode($output, true);
	$id= $r['id'];
	$diff = date("hi");
	$path = "cache/".$id.$diff.".jpg";
	$temp = "cache/temp/".$id.$diff.".jpg";
	$_SESSION['path'] = $path;
	// only create if not already exists in cache
	if (!file_exists($path)){	
		create($id, $path,$temp);
	}
	else{
		echo " \n already exitst : ".$path;
	}

	// HttpRequest for user profile image 
	function curly($token){

        // create curl resource
		$ch = curl_init();

        // set url
		curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=".$token);

        //return the transfer as a string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
		$output = curl_exec($ch);

        // close curl resource to free up system resources
		curl_close($ch); 

		return $output;
	}

	// Create image 
	function create($id, $path,$temp){
		//Resizer Code
			$filename = "https://graph.facebook.com/".$id."/picture?width=560&height=560";
			$percent = 560; // percentage of resize

			// Get new dimensions
			list($width, $height) = getimagesize($filename);
			$new_width = $percent;
			$new_height = $percent;

			// Resample
			$image_p = imagecreatetruecolor($new_width, $new_height);
			$image = imagecreatefromjpeg($filename);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

			// Output
			imagejpeg($image_p,$temp, 100);

	    // base image is just a transparent png in the same size as the input image
		$base_image = imagecreatefrompng("images/template560.png");
	    // Get the facebook profile image in 200x200 pixels
		$photo = imagecreatefromjpeg("$temp");
			
	    // read overlay  
		$overlay = imagecreatefrompng("images/overlay560.png");
	    // keep transparency of base image
		imagesavealpha($base_image, true);
		imagealphablending($base_image, true);
	    // place photo onto base (reading all of the photo and pasting unto all of the base)
		imagecopyresampled($base_image, $photo, 0, 0, 0, 0, 560, 560, 560, 560);
		
	    // place overlay on top of base and photo
		imagecopy($base_image, $overlay, 0, 0, 0, 0, 560, 560);
	    // Save as jpeg
		imagejpeg($base_image, $path, 100);
	}
	//Change Profile Pic Size
	?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Malaithenral | Update </title>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<img src=<?php echo $bg_path?> class="bg">
    <div class="container">
	    <div class="row">
	      
	      <div class="header">
	      	<h1>You new profile picture is ready !</h1>
	        <img class="profile" src=<?php echo $path ?> alt="">
	      </div>
	      <div class="content">
	       <br/>
	  	<form action="update.php" method='post'>
	   	 <label for="update" >Status:</label>
		  <textarea class="u-full-width" placeholder="#Malaithenral 2016" name="text"></textarea>
		  <input class="button-primary" value="Post to Facebook | Update" type="submit">
		</form>

	      Spread the word:
	     <ul class="share-buttons">
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
				<li><a href="https://twitter.com/intent/tweet?source=&text=Show%20your%20support%20for%20Malaithenral%20https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F&via=ImPrana" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
		</ul>
	      
	      </div>
	      <div class="footer"><a href='https://twitter.com/ImPrana' target="_blank">Made</a> by <a href="https://twitter.com/ImPrana" target="_blank">Pranavan Sp</a> </div>
	    </div>
    </div>

    
  </body>
</html>