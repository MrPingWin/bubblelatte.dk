<?php
  if (@$_GET["continue"]) {
    $continue = $_GET["continue"];
  } else {
    $continue = $_SERVER["HTTP_REFERER"];
  }
  if(!session_id()){
    session_start();
  }
  
  session_destroy();
  header("Location: $continue");

  $title = "Log ud";
  include("includes/header.php");
  ?>