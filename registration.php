<?php

require 'vendor/autoload.php';

$mysqli = new mysqli("localhost", "root", "", "practicebase");
?>
<html>
<div class="inputFields">
	<form action="index.php" method='POST'>
		<div class="nameInput">
			<input class="nameEntryField" placeholder="Name" type='text' id='username' name='username'><br>
		</div>

		<input class="loginInput" placeholder="Login" id='login' name='login'><br>

        <input class="passwordInput" placeholder="Password" id='password' name='password'><br>

		<div class="saveButtonField">
			<input class="saveButton" type="submit" value='Сохранить'>
		</div>
	</form>
</div>
<?
['username' => $name, 'login' => $login, 'password' => $password] = $_POST;
$sql = "INSERT INTO users (NAME, LOGIN, PASSWORD) VALUES ('$name', '$login', '$password')";
$result = $mysqli->query($sql);
print_r($_POST);
?>


