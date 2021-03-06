<?php

function getHeader() {
  echo "<div id=\"header\">";
  echo "<div id=\"heading\" class=\"headerElement\">";
  echo "<h1>Corona Warn App</h1>";
  echo "</div>";
  if (isset($_COOKIE["corona_app_v2-uid"])) {
    echo "<div class=\"controls headerElement\">";
    echo "<div><a href=\"/php/logout.php\" target=\"_blank\">Logout</a></div>";
    echo "</div>";
  } else {
    echo "<div class=\"controls headerElement\">";
    echo "<div><a href=\"/php/login.php\" target=\"_blank\">Login</a></div>";
    echo "</div>";
  }
  echo "<div class=\"controls headerElement\"><a href=\"/\">Startseite</a></div>";
  echo "</div>";
}

function getSuccesfullyNotification() {
  echo "<script>";
  echo "alert(\"Ihre Registrierung war erfolgreich!\");";
  echo "window.location.href=\"/\";";
  echo "</script>";
}

function getImportantHeader() {
  echo "<meta charset=\"utf-8\">";
  echo "<title>Corona App V2</title>";
  echo "<link href=\"/css/main-style.css\" rel=\"stylesheet\">";
}

function getLogInForm() {
  echo file_get_contents("./html/login.html");
}

function getReportForm() {
  echo file_get_contents("./html/report-form.html");
}

?>
