<?php
require 'vendor/autoload.php';
use Poc\Classes\Users\User;

$user = new User();
?>

<html>
<div class="inputFields">
	<form action="" method='POST'>

		<input class="loginInput" placeholder="Login" id='login' name='login'><br>

		<input class="passwordInput" placeholder="Password" id='password' name='password'><br>

		<div class="saveButtonField">
			<input class="saveButton" type="submit" value='Сохранить'>
		</div>
	</form>
</div>

<?
$user->logIN($_POST);

?>

