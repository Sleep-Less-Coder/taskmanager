<?php
	require_once 'mysqlConnect.php';
	if (isset($_GET['id']) && isset($_GET['status'])) {
		$id = $_GET['id'];
		$status = $_GET['status'];

		$query = "UPDATE tasks set status=$status WHERE id=$id";

		$result = $mysqli->query($query) or die(error.__LINE__);
		$result = $mysqli->affected_rows;

		echo $json_response = json_encode($result);
	}
?>