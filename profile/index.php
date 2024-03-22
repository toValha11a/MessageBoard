<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use Main\Classes\Api\Users\UserApi;
$user = new UserApi();
?>
<?php
$checkAuth = $user ->checkAuth();
if ($checkAuth == false) {
    header('Location: http://practice/profile/authorization/');
}
?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>


<div>Личный кабинет</div>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>
