<?php

namespace DOM\Validators;
use DOM\DTO\Input\Data;
use DOM\Exceptions\FileNotFound;
use DOM\Exceptions\KeyNotFound;

class CheckFile{
	public static function findFile(Data $data)
	{
		if(!file_exists($data->path))
			throw new FileNotFound();
		else
			return true;
	}

}
