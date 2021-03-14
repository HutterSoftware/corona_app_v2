<?php

function distance($lat1, $lon1, $lat2, $lon2) {
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos( $dist );
	$dist = rad2deg( $dist );
	$miles = $dist * 60 * 1.1515;

	return ( $miles * 1.609344 );
}

$serverList = explode("\n", file_get_contents("../server-lists/list.txt"));
$moveProfile = array();
$timestamps = "";

foreach ($serverList as $server) {
  $connection = getDBConnection($server);
  $statementString = "select idapp_user, longitude, latitude, sample_time " .
                    "from tracking where idapp_user = ? order by sample_time " .
                    "DESC";
  $statement = $connection->prepare($statementString);
  $statement->bind_param("i", $_POST["app-user-id"]);
  $statement->execute();

  $result = $statement->get_result();
  $results = $result->fetch_all();
  for ($i = 0; $i < sizeof($results); $i++) {
    array_push($moveProfile, $results[$i]);
    $timestamps .= "\"" . $results[$i][3] . "\"";
    if ($i < sizeof($results) - 1) {
      $timestamps .= ", ";
    }
  }
}

$moveProfile = array_unique($moveProfile);
$potentialPeople = array();

foreach($serverList as $server) {
  $connection = getDBConnection($server);
  $statementString = "select tracking.idapp_user, longitude, latitude, " .
    "sample_time from tracking inner join app_user on tracking.idapp_user = " .
    "app_user.idapp_user where tracking.idapp_user != ? and " .
    "app_user.health_state != 0 and sample_time in (" . $timestamps . ") " .
    "order by sample_time DESC";
  $statement = $connection->prepare($statementString);
  $statement->bind_param("i", $_COOKIE["corona_app_v2-uid"]);
  $statement->execute();
  $result = $statement->get_result();
  $results = $result->fetch_all();
  foreach ($results as $potentialRecords) {
    array_push($potentialPeople, $potentialRecords);
  }
}

$potentialPeople = array_unique($potentialPeople);
$listOfWarnedPeople = array();

foreach ($potentialPeople as $people) {
  $longitude1 = $people[1];
  $latitude1 = $people[2];
  foreach($moveProfile as $profile) {
    $latitude2 = $profile[2];
    $longitude2 = $profile[1];
    echo distance($latitude1, $longitude1, $latitude2, $longitude2)*1000 . "  1.5<br>";
    if (distance($latitude1, $longitude1, $latitude2, $longitude2) * 1000 < 1000.5) {
      if (!in_array($profile[0], $listOfWarnedPeople)) {
        $statementString = "update app_user set health_state = 2 where " .
        "idapp_user = ?";
        echo $profile[0];
        $statement = $connection->prepare($statementString);
        $statement->bind_param("i", $people[0]);
        $statement->execute();
        array_push($listOfWarnedPeople, $people[0]);
        echo "<br>3wf";
      }
    }
  }
}

 ?>
