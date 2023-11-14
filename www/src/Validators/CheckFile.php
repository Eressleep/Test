<?php

namespace DOM\Validators;
use DOM\DTO\Input\Data;
use DOM\Exceptions\FileNotFound;

class CheckFile{
	/**
	 * @param Data $data
	 *
	 * @return true
	 * @throws FileNotFound
	 */
	public static function findFile(Data $data) : bool
	{
		if(!file_exists($data->path))
			throw new FileNotFound();
		else
			return true;
	}

}
