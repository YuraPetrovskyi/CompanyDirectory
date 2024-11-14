<?php
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
		
		echo json_encode($output);
		
		$conn->close();
    exit;
	}	

  $query = $conn->prepare('SELECT name FROM location WHERE id = ?');

  $query->bind_param("i", $_POST['id']);

  $query->execute();

  $result = $query->get_result();

  if (!$result) {
    $output['status']['code'] = "400";
    $output['status']['name'] = "executed";
    $output['status']['description'] = "query failed";  
    $output['data'] = [];

    echo json_encode($output);
    $query->close();
    $conn->close();
    exit;
  }

  if ($result->num_rows > 0) {
    $location = $result->fetch_assoc();
    $output['status']['code'] = "200";
    $output['status']['name'] = "ok";
    $output['status']['description'] = "success";
    $output['data']['locationName'] = $location["name"];
  } else {
    $output['status']['code'] = "404";
    $output['status']['name'] = "error";
    $output['status']['description'] = "Location not found";
    $output['data'] = [];
  }

  $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
  echo json_encode($output);

  $query->close();
  $conn->close();

?>