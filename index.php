<?php
  require( __DIR__.'/facebook_start.php' );
  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email', 'user_posts','publish_actions']; // optional
  $callback_url    = '<<YOUR CALLBACK URL>>';
  $loginUrl    = $helper->getLoginUrl($callback_url, $permissions);
  $bg_path = 'images/bg1.jpg';
  ?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Show your support for Malaithenral</title>
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
    <img src=<?php echo $bg_path;?> class="bg">
    <div class="container">
      <div class="row">
        
        <div class="header">
          <h1>Show your support for மலைத்தென்றல்</h1>
          <img class="profile" src="images/sp.jpg"/>
        </div>
        <div class="content">
        <br/>
        <p>Show your support for மலைத்தென்றல்  by updating your Facebook picture.</p>
          <a class="button button-primary" href=<?php echo htmlspecialchars($loginUrl);?> > Log in to Facebook </a>
       </div>
       <ul class="share-buttons">
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F" title="Share on Facebook" target="_blank"><img src="images/simple_icons_black/Facebook.png"></a></li>
				<li><a href="https://twitter.com/intent/tweet?source=&text=Show%20your%20support%20for%20Malaithenral%20https%3A%2F%2Fwww.showcasequeen.com%2Fsp%2F&via=ImPrana" target="_blank" title="Tweet"><img src="images/simple_icons_black/Twitter.png"></a></li>
		</ul>
        <footer class="footer">
        <a href='https://twitter.com/ImPrana' target="_blank">Made</a> by <a href="https://twitter.com/ImPrana" target="_blank">Pranavan SP</a>
        </footer>

      </div>
    </div>
    
  </body>
</html>
