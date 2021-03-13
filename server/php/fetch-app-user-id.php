<?php

include "db-utils.php";

$connection = getDBConnection("localhost");
$statementString = "select max(idapp_user) from app_user";
$statement = $connection->prepare($statementString);
$statement->execute();

$result = $statement->get_result();
$maxNumber = $result->fetch_array()[0];

$newId;
if ($maxNumber === "NULL") {
  $newId = 1;
} else {
  $newId = $maxNumber + 1;
}

$statementString = "insert into app_user(idapp_user) values(?)";
$statement = $connection->prepare($statementString);
$statement->bind_param("i", $newId);
$statement->execute();

echo $newId;

 ?>
