<?php

namespace Poc\Classes\Users;

use Poc\Classes\Helper\ORM;

class User
{
	public function reg($params)
	{
		$orm = new ORM();
		['username' => $name, 'login' => $login, 'password' => $password] = $params;
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$orm->setTable('users')
			->setFields(['NAME', 'LOGIN', 'PASSWORD'])
			->setValues([$name, $login, $passwordHash])
			->addQuery()
			->exec();
	}

	public function logIn($params)
	{
		['login' => $login, 'password' => $password] = $params;
		$orm = new ORM();
		$data = $orm->getExec();
		$passwordVerify = password_verify($password, $data['userpassword']);
		if ($passwordVerify = true && $login = $data['userlogin'])
		{
			print_r('ура блять');
		}else{
			print_r('СУКА');
		}
	}
}