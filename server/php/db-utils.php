<?php

  function getDBConnection($host) {
    $connection = mysqli_connect("localhost", "corona_app_v2", "wfewef", "corona_app_v2");
    return $connection;
  }

  function isUserDocOrHealthDepartemnt($uid) {
    $connection = getDBConnection("localhost");
    $statementString = "select count(*) from group_assignement where iduser = ?";
    $statement = $connection->prepare($statementString);
    $statement->bind_param("i", $uid);
    $statement->execute();
    $result = $statement->get_result();
    $isUserValid = $result->fetch_array()[0];
    return $isUserValid;
  }

 ?>
