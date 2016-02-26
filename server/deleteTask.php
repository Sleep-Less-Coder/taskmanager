<?php
	require_once 'mysqlConnect.php';

	if(isset($_GET['taskID'])){
		$taskID = $_GET['taskID'];

		$query = "DELETE FROM tasks WHERE id=$taskID;";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

		$result = $mysqli->affected_rows;
		
		echo $json_response = json_encode($result);
	}
?>
