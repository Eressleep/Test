<?php

namespace DOM\Services\Reader;

use DOM\DTO\Input\Data;

class File
{

	public static function read(Data $data) : array
	{
		$out = [];
		$key = 0;
		$file = fopen($data->path, 'r');
		while (!feof($file)) {
			$str = fgets($file);
			if (strlen($str) == 1) {
				$key++;
				continue;
			}

			$out[$key][] = trim($str);
		}
		return $out;
	}
}
