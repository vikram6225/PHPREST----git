<?php  

  defined('DS')?null:define('DS',DIRECTORY_SEPARATOR);

  defined('SITE_ROOT')?null:define('SITE_ROOT','C:'.DS.'xampp'.DS.'new'.DS.'WWW'.DS.'PHPREST');
   //xampp/www/api/includes
  defined('INC_PATH')?null:define('INC_PATH',__DIR__.'\..\includes');

  defined('CORE_PATH')?null:define("CORE_PATH",__DIR__);


  //load the config file first
  require_once(INC_PATH.DS."config.php");

  //core classes
  require_once(CORE_PATH.DS."post.php");

  require_once(CORE_PATH.DS."category.php");









?>