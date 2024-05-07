<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Main\Classes\Api\Users\UserApi;
use Main\Classes\Helper\Helper;
$user = new UserApi();
$usersPosts = $user ->userSelfPosts();
?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>
<div class="userpost-title">Ваши посты</div>
<div class="users-posts">
	<?
	foreach ($usersPosts as $post) {
		?>
        <div class="user-post">
            <p class="title"><?=$post["HEADING"]?></p>
            <p class="text"><?=$post["MESSAGES"]?></p>
        </div>
	<? } ?>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/profile/userposts/style.php' ?>
