<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
use Main\Classes\Helper\Helper;
use Main\Classes\Api\Users\UserApi;
$user = new UserApi();
//Helper::debug($_SESSION);
$usersPosts = $user ->mainPagePosts();
//Helper::debug($usersPosts);
?>
    <? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/header.php';?>


<div class="users-posts">
    <?
        foreach ($usersPosts as $post) {
    ?>
        <div class="user-post">
            <span class="user-name"><?=$post["USERNAME"]?></span>
            <p class="title"><?=$post["HEADING"]?></p>
            <p class="text"><?=$post["MESSAGES"]?></p>
        </div>
    <? } ?>
</div>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';?>
<? include_once $_SERVER['DOCUMENT_ROOT'] . '/mainpage/styles.php ';?>