<?php

namespace DOM\Exceptions;
class KeyNotFound extends \Exception
{
	public function __construct(?\Throwable $previous = null)
	{
		parent::__construct('Ключ не найден.', 404, $previous);
	}
}
