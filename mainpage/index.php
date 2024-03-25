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
<style>
    .users-posts{

    }
    .user-post {

        width: 50%;
        margin-bottom: 60px;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    .user-name{

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