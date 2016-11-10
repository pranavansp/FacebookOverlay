<?php 
  ini_set('display_errors',1); 
  error_reporting(E_ALL);
  session_start();
  require( __DIR__.'/Facebook/autoload.php' );
  $fb = new Facebook\Facebook(array(
    'app_id'                => 'APP_ID',
    'app_secret'            => 'APP_SECRET',
    'default_graph_version' => 'v2.3',
	'persistent_data_handler'=>'session',
    ));
  function debug_to_console($data) {
      if(is_array($data) || is_object($data))
    {
      echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
    } else {
      echo("<script>console.log('PHP: ".$data."');</script>");
    }
  }
