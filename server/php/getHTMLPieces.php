<?php

function getHeader() {
  echo file_get_contents("./html/header.html");
}

function getSuccesfullyNotification() {
  echo "<script>";
  echo "alert(\"Registration was successully!\");";
  echo "window.location.href=\"/\";";
  echo "</script>";
}

function getImportantHeader() {
  echo "<meta charset=\"utf-8\">";
  echo "<title>Corona App V2</title>";
  echo "<link href=\"/css/main-style.css\" rel=\"stylesheet\" type=\"text/css\">";
}

?>
