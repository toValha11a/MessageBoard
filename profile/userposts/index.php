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

<style>
    .userpost-title{
        font-size: 25px;

    }
    .user-post {

        width: 50%;
        margin-bottom: 60px;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    .title{
        text-align:center;
        font-size: 30px;
        font-weight: bold;
    }
    .text{
        text-align:left;
        font-family: "Times New Roman";
        font-size: 20px;
    }
</style>