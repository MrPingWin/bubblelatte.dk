<?php
  if (@$_GET["continue"]) {
    $continue = $_GET["continue"];
  } else {
    $continue = $_SERVER["HTTP_REFERER"];
  }
  if(!session_id()){
    session_start();
  }
  
  if (@$_POST) {
    $username = basename(strtolower($_POST["username"]));
    $passwd = $_POST["passwd"];
    
    if (!$username || !$passwd) {
      $error = "Du skal angive et brugernavn og kodeord!";
    } else if (!is_file("data/brugere/$username.json")) {
      $error = "Brugeren eksisterer ikke!";
    } else {
      $bruger = json_decode(file_get_contents("data/brugere/$username.json"), true);
      if (md5($passwd) === $bruger["passwd"]) {
        $_SESSION["username"] = $bruger["username"];
      } else {
        $error = "Forkert kodeord!";
      }
    }
  }
  function xq($s) { return htmlspecialchars($s); }
  function uq($s) { return urlencode($s); }
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Bubble Latte</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<p class="error"><?=xq(@$error)?></p>

<div id="menu">
<div class="knap" id="button1"></div>
<div class="knap" id="button2"></div>
<div class="knap" id="button3"></div>
<div class="knap" id="button4"></div>
<div class="knap" id="button5"></div>
<div class="knap" id="button6"><button id="logIn"></button></div>
</div>


<div id="login" class="login active"> 
<p class="error"><?=xq(@$error)?></p>
<form method="post" action="?continue=<?=uq($continue)?>">
        <p><input type="text" name="username" placeholder="Indtast brugernavn" class="input"/></p>
        <p><input type="text" name="groupname" placeholder="Indtast gruppenavn" class="input"/></p>
        <p><input type="password" name="passwd" placeholder="Indtast kodeord" class="input"/></p>
        <p><input type="submit" value="Log ind" /></p>
        <button id="luk"></button>
      </form>
      
          <form action="logout.php" method="get">
          <input type="submit" value="Run me now!">
          </form>
      
</div>

<script src="js/script.js"></script>
</body>
</html>
