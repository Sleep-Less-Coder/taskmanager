<?php
	require_once 'mysqlConnect.php';

	$query = "SELECT id,task,status FROM tasks ORDER BY status";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$arr = array();

	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			$arr[] = $row;
		}
	}
	echo $json_response = json_encode($arr);
?>