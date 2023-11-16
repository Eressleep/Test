<?php

namespace DOM\Exceptions;
use Exception;
use Throwable;

class KeyNotFound extends Exception
{
	public function __construct(?Throwable $previous = null)
	{
		parent::__construct('Ключ не найден.', 404, $previous);
	}
}
