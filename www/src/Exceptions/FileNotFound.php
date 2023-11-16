<?php

namespace DOM\Exceptions;
use Throwable;

class FileNotFound extends GeneralException
{
	public function __construct(?Throwable $previous = null)
	{
		parent::__construct('Файл не найден.', 404, $previous);
	}
}
