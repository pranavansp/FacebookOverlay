<?php 
require( __DIR__.'/facebook_start.php' );
$text = htmlspecialchars($_POST['text']);
$bg_path = 'images/bg1.jpg';
//echo $text;
$token = $_SESSION['facebook_access_token'];
var_dump($_SESSION['path']);
$path = $_SESSION['path'];
var_dump($path);

//Upload image
upload($path,$token,$fb,$text);
function upload($path,$token,$fb,$text)
{
	$image = [
	  'caption' => $text,
	  'source' => $fb->fileToUpload($path),
	  
	];

	try {
	  $response = $fb->post('/me/photos', $image, $token);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$graphNode = $response->getGraphNode();

	print_r($graphNode);
	//echo " \n Photo ID: " . $graphNode['id'];
}

session_write_close();

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
      	<h1>Thank you for your support! Malaithenral </h1>
        <img class="profile" src=<?php echo $path ?> alt="">
      </div>
      <div class="content">
      Your picture is uploaded on Facebook.
       <br/>
      Spread the word:
        <ul class="share-buttons">
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
				<li><a href="https://twitter.com/intent/tweet?source=&text=Show%20your%20support%20for%20Malaithenral%20https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F&via=ImPrana" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
		</ul>
      
      </div>
      <div class="footer"><a href='https://twitter.com/ImPrana' target="_blank">Made</a> by <a href="https://twitter.com/ImPrana" target="_blank">Pranavan SP</a> </div>
    </div>
</div>


</body>
</html>