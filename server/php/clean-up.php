<?php

// Delete old tracking records
$connection = getDBConnection("localhost");
$currentTime = time() - 1209600;
$currentTimeString = date("Y-m-s H:i:s", $currentTime);
$statementString = "delete from tracking where sample_time < ?";
$statement = $connection->prepare($statementString);
$statement->bind_param("s", $currentTime);
$statement->execute();


$statementString = "update app_user set health_state = 1, change_date = " .
                  "CURRENT_TIMESTAMP where change_date < ?";

$statement = $connection->prepare($statementString);
$statement->bind_param("s", $currentTime);
$statement->execute();
 ?>
