<?php

	// example use from browser
	// http://localhost/companydirectory/libs/php/getAll.php

	include("config.php");

  if ($environment === 'development') {
		ini_set('display_errors', 'On');
		error_reporting(E_ALL);
  } else {
		ini_set('display_errors', 'Off');
		error_reporting(0);
  }

	$executionStartTime = microtime(true);

	header('Content-Type: application/json; charset=UTF-8');

	$conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

	if (mysqli_connect_errno()) {
		
		$output['status']['code'] = "300";
		$output['status']['name'] = "failure";
		$output['status']['description'] = "database unavailable";
		$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output);

		exit;

	}	

	// SQL does not accept parameters and so is not prepared

	$query = 'SELECT p.id, p.firstName, p.lastName, p.email, d.name as departmentName, l.name as locationName 
          FROM personnel p 
          LEFT JOIN department d ON (d.id = p.departmentID) 
          LEFT JOIN location l ON (l.id = d.locationID) 
          ORDER BY p.lastName, p.firstName, d.name, l.name';

	$result = $conn->query($query);
	
	if (!$result) {

		$output['status']['code'] = "400";
		$output['status']['name'] = "executed";
		$output['status']['description'] = "query failed";	
		$output['data'] = [];

		mysqli_close($conn);

		echo json_encode($output); 

		exit;

	}
  
  $data = [];

	while ($row = mysqli_fetch_assoc($result)) {

		array_push($data, $row);

	}

	$output['status']['code'] = "200";
	$output['status']['name'] = "ok";
	$output['status']['description'] = "success";
	$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
	$output['data'] = $data;
	
	mysqli_close($conn);

	echo json_encode($output); 

?>