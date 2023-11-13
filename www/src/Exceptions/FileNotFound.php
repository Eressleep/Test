<?php

namespace DOM\Exceptions;
class FileNotFound extends \Exception
{
	public function __construct(?\Throwable $previous = null)
	{
		parent::__construct('Файл не найден.', 404, $previous);
	}
}
