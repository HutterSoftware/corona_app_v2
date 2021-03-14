<?php

if (!isset($_COOKIE["corona_app_v2-uid"])) {
  header("Location: /overview.php", 200);
}

include("db-utils.php");

if (!isUserDocOrHealthDepartemnt($_COOKIE["corona_app_v2-uid"])) {
  header("Location: /overview.php", 200);
}

$connection = getDBConnection("localhost");
$statementString = "update app_user set health_state = 0, change_date = CURRENT_TIMESTAMP where idapp_user = ?";
$statement = $connection->prepare($statementString);
$statement->bind_param("i", $_POST["app-user-id"]);

if ($statement->execute()) {
  include "set-corona-warnings.php";
  //header("Location: /overview.php?report=1", 200);
} else {
  //header("Location: /overview.php", 200);
}


 ?>
