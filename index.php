<?php
  if(isset($_GET['_id']) && is_numeric($_GET['_id'])){
    $pageid = intval($_GET['_id']);
  } else {
    $pageid = '_xx';
  }

  $loop = false;
  if(isset($_GET['_loop']) && strcmp(trim($_GET['_loop']),'true')==0){
    $loop = true;
  }

  if(is_file('index.inc.php')){
    include_once('index.inc.php');
  } else {
    print "Template error #3248765823";
  }

  exit();
