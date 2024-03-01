<?php
$mysqli = new mysqli("localhost", "root", "", "practicebase" );

$sql = "SELECT ID,PASSWORD FROM users";
if ($result = $mysqli->query($sql))
{
	while ($row = $result->fetch_array()) {
		$userId = $row['ID'];
		$userPassword = $row['PASSWORD'];
	}
}
print_r($userPassword);