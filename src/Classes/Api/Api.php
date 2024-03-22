<?php

namespace Main\Classes\Api;

class Api
{
	public function sendSuccess(array $data, string $message)
	{
		$result = [
			'result' => true,
		];

		if (count($data) > 0) {
			$result['data'] = $data;
		}

		if (!empty($message)) {
			$result['message'] = $message;
		}

		return $result;
	}

	public function sendError(string $message)
	{
		$result = [
			'result' => false,
		];

		if (!empty($message)) {
			$result['message'] = $message;
		}

		return $result;
	}
}