<?php
session_start();
define('LIBRARIES','../../../../libraries/'); 

/* Config */
require_once LIBRARIES."config.php";
require_once LIBRARIES.'autoload.php';
new AutoLoad();

function removeAllFile($dir,$check=true){
  if (is_dir($dir))
  {
    $structure = glob(rtrim($dir, "/").'/*');
    if (is_array($structure)) {
      foreach($structure as $file) {
        if (is_dir($file)) removeAllFile($file,$check);
        else if (is_file($file)) {
          if($file!='.htaccess') {
            @unlink($file);
          }
        }
      }
    }
    if($check==true)
    {
      rmdir($dir);
    }
  }
} 
removeAllFile('../../../../assets/css');
removeAllFile('../../../../assets/js');
removeAllFile('../../../../libraries');
removeAllFile('../../../../templates');
