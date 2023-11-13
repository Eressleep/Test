<?php

namespace DOM\DTO\Output;
readonly class Data
{
	public function __construct(
		public int    $id,
		public string $name,
		public string $adrees,
		public string $phone,
	) {
	}
}
