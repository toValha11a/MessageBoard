<?php
session_start();
use Main\Classes\Api\Users\UserApi;
$user = new UserApi();
?>
<div class="inAccountMessage">
    <p><?$user->inAccountMessage();?></p>
</div>
<div>
    <ul>
        <li><a href="/profile">Личный кабинет</a></li>
        <li><a href="/profile/registration">Регистрация</a> </li>
        <li><a href="/profile/authorization">Авторизация</a> </li>
        <li><a href="/profile/userposts">Мои посты</a> </li>
        <li><a href="/create-post">Создать пост</a></li>
        <li><a href="/mainpage">На главную</a></li>
    </ul>
</div>