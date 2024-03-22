<?php

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Main\Classes\Api\Users\UserApi;

$user = new UserApi();
?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>
<div class="inputFields">
	<form action="" method='POST'>
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
$user->reg($_POST);
?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>

