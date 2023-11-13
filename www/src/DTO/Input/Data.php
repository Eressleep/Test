<?php

namespace DOM\DTO\Input {

	readonly class Data
	{
		public function __construct(
			public string $path,
		) {}
	}
}
