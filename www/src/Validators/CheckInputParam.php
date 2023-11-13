<?php

namespace DOM\Validators;
use DOM\DTO\Input\Data;
use DOM\Exceptions\KeyNotFound;

class CheckInputParam{
	const KEY = 'PATH';
	public static function checkKey(array $data)
	{
		$out = '';
		foreach ($data as $item) {
			$tmp = explode('=', $item);
			if (count($tmp) > 1 and $tmp[0] == self::KEY) {
				$out = new Data(path: $tmp[1]);
			}
		}
		return $out == '' ? throw new KeyNotFound() : $out;
	}

}
