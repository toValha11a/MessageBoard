<?php
namespace Main\Classes\Api\Users;

use Main\Classes\Helper\ORM;
use Main\Classes\Helper\Helper;
class UserApi
{

	/**
	 * @param $params
	 * @return void
	 */
	public function reg($params)
	{
		$orm = new ORM();
		['username' => $name, 'login' => $login, 'password' => $password] = $params;
		$passwordHash = password_hash((string)$password, PASSWORD_DEFAULT);
		$orm->setTable('users')
			->setFields(['NAME', 'LOGIN', 'PASSWORD'])
			->setValues([$name, $login, $passwordHash])
			->addQuery()
			->exec();
	}

	/**
	 * @param $params
	 * @return array
	 */
	public function logIn($params): array
	{
		['login' => $login, 'password' => $password] = $params;
		$orm = new ORM();
		$userData = $orm->setFields(['LOGIN', 'PASSWORD', 'ID', 'NAME'])
			->setTable('users')
			->setFilter([
				'LOGIN' => $login
			])
			->getQuery()
			->getExec();

		if (count($userData) == 0) {
			return [
				'result' => false,
				'message' => 'Пользователя с таким логином не существует'
			];
		}

		$hash = $userData[0]['PASSWORD'];
		$passwordVerify = password_verify((string)$password, $hash);

		if ($passwordVerify == false) {
			return [
				'result' => false,
				'message' => 'Неверный пароль'
			];
		}
		session_start();
		$_SESSION["user_id"] = $userData[0]['ID'];
		$_SESSION["user_name"] = $userData[0]['NAME'];
		return [
			'result' => true,
			'message' => 'Авторизация прошла успешно'
		];
	}

	/**
	 * @param $params
	 * @return void
	 */
	public function sendMessage($params): void
	{
		$userId = $_SESSION["user_id"];
		$userName = $_SESSION["user_name"];
		['message' => $text, 'heading' => $heading] = $params;
		$orm = new ORM();
		$orm->setTable('messages')
			->setFields(['USERID', 'MESSAGES', 'HEADING', 'USERNAME'])
			->setValues([$userId, $text, $heading, $userName])
			->addQuery()
			->exec();
	}

	public function checkAuth(): bool
	{
		$isAuth = false;
		if (isset($_SESSION['user_id'])) {
			$isAuth = true;
		}
		return $isAuth;
	}
	public function mainPagePosts(): array
	{

		$orm = new ORM();
		$usersPosts = $orm ->setFields(['MESSAGES', 'HEADING', 'USERNAME'])
			->setTable('messages')
			->getQuery()
			->getExec();
		return $usersPosts;
	}

}