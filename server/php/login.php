<?php

// TODO: Implement login
if (!isset($_POST["username"])) {
  header("Location: /overview.php", 200);
}

if (!isset($_POST["password"])) {
  header("Location: /overview.php", 200);
}

include "db-utils.php";

$connection = getDBConnection(file_get_contents("../server-lists/login-database.txt"));
$statementString = "select password, iduser from user where username = ?";
$statement = $connection->prepare($statementString);
$statement->bind_param("s" ,$_POST["username"]);
$statement->execute();

if ($statement->{"num_rows"} == 0) {
  header("Location: /overview.php", 200);
}

$result = $statement->get_result();
$row = $result->fetch_array();
$uid = $row[1];
$passwordHash = $row[0];

if (!password_verify($_POST["password"], $passwordHash)) {
  header("Location: /overview.php", 200);
}

setcookie("corona_app_v2-uid", $uid, time() + 3600, "/");
header("Location: /overview.php", 200);

?>
