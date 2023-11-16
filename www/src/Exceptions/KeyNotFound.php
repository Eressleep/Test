<?php

namespace DOM\Exceptions;
use Throwable;

class KeyNotFound extends GeneralException
{
	public function __construct(?Throwable $previous = null)
	{
		parent::__construct('Ключ не найден.', 404, $previous);
	}
}
