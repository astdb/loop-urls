<?php
  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $pageid = intval($_GET['id']);
  } else {
    $pageid = '_xx';
  }

  if(is_file('index.inc.php')){
    include_once('index.inc.php');
  } else {
    print "Template error #3248765823";
  }

  exit();
