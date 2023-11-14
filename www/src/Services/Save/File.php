<?php

namespace DOM\Services\Save;


class File{
	const pathToSave = 'output/';

	public static function save(string $file, string $name)
	{
		$path = self::pathToSave.time().$name;
		$status = file_put_contents($path, $file);
		if($status){
			print_r($name.' '. $path);
		}
	}
}
