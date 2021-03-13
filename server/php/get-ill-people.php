<?php

function getIllPeople() {
  include "db-utils.php";

  if (!$_COOKIE["corona_app_v2-uid"]) {
    header("Location: /overview.php");
  }

  $connection = getDBConnection("localhost");
  if (!isUserDocOrHealthDepartemnt($_COOKIE["corona_app_v2-uid"])) {
    header("Location: /overview.php");
  }

  $statementString = "select count(*) from app_user";
  $statement = $connection->prepare($statementString);
  $statement->execute();
  $result = $statement->get_result();
  $numberOfAppUser = $result->fetch_array()[0];

  $statementString = "select count(*) from app_user where health_state = 0";
  $statement = $connection->prepare($statementString);
  $statement->execute();
  $result = $statement->get_result();
  $numberOfIllPeople = $result->fetch_array()[0];

  $results = [ "number-of-appuser" => $numberOfAppUser,
               "number-of-ill-people" => $numberOfIllPeople];

  return $results;
}

 ?>
