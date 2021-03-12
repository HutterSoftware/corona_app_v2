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

?>
