<?php

namespace Main\Classes\Helper;

class Helper
{
	public static function debug(array $data): void
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	public static function dumpDebug(array $data): void
	{
		echo '<pre>';
		var_dump($data);
		echo '</pre>';
	}
}