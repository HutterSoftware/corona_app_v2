<?php

if (isset($_POST["longitude"])) {

}

if (!isset($_POST["latitude"])) {

}

if (!isset($_POST["timestamp"])) {

}

if (!isset($_POST["id"])) {

}

include "db-utils.php";

$serverList = explode("\n", file_get_contents("../server-lists/list.txt"));

foreach ($serverList as $server) {
  $connection = getDBConnection($server);
  $statementString = "select count(*) from tracking";
  $statement = $connection->prepare($statementString);
  $statement->execute();

  $result = $statement->get_result();
  $numRows = $result->fetch_array()[0];

  if ($numRows > 100000000) {
    continue;
  }

  $statementString = "insert into tracking(longitude, latitude, sample_time, " .
                      "idapp_user) values(?,?,?,?)";
  $statement = $connection->prepare($statementString);
  $date = date("Y-m-d H:i:s", $_POST["timestamp"] / 1000);
  $statement->bind_param("ddsi",
                          $_POST["longitude"],
                          $_POST["latitude"],
                          $date,
                          $_POST["id"]);

  $statement->execute();

  $statementString = "select health_state from app_user where idapp_user = ?";
  $statement = $connection->prepare($statementString);
  $statement->bind_param("i", $_POST["id"]);
  $statement->execute();

  $result = $statement->get_result();
  $warningLevel = $result->fetch_array()[0];
  echo $warningLevel;
  break;
}

 ?>
