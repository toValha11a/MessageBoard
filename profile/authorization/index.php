<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Main\Classes\Api\Users\UserApi;
use Main\Classes\Helper\Helper;
$user = new UserApi();
$checkAuth = $user ->checkAuth();
if ($checkAuth == true) {
	header('Location: http://practice/profile/');
    exit;
}
if (count($_POST) > 0) {
	$authMessage = $user->logIn($_POST);
}

?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>
<?if (count($_POST) > 0) {?>
	<div class="message <?
	echo $authMessage['result'] == false ? 'error' :  '';
	?>">
		<?
		echo $authMessage['message'];
		?>
	</div>
	<?}
    ?>
	<div class="inputFields">
		<form action="" method='POST'>

			<input class="loginInput" placeholder="Login" id='login' name='login'><br>

			<input class="passwordInput" placeholder="Password" id='password' name='password'><br>

			<div class="saveButtonField">
				<input class="saveButton" type="submit" value='Сохранить'>
			</div>
		</form>
	</div>



<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>
