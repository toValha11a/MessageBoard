<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Main\Classes\Api\Users\UserApi;
use Main\Classes\Helper\Helper;
Helper::debug($_SESSION);
$user = new UserApi();

?>

<html>
<div>
	<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>
</div>
<div class="inputFields">
	<form action="" method='POST'>
		<div class="nameInput">
			<input class="nameEntryField" placeholder="Заголовок" type='text' id='heading' name='heading'><br>
		</div>

		<textarea class="textInput" placeholder="Текст" id='message' name='message'></textarea><br>

		<div class="saveButtonField">
			<input class="saveButton" type="submit" value='Сохранить'>
		</div>
	</form>
</div>
<pre>
<?php
$user->sendMessage($_POST);
?>
</pre>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/create-post/styles.php';?>
