<?php

if (isset($_COOKIE["corona_app_v2-uid"])) {
  setcookie("corona_app_v2-uid", "", -1, "/");
}

header("Location: /overview.php");

 ?>
