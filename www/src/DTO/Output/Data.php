<?php

namespace DOM\DTO\Output{
	readonly class Data
	{
		/**
		 * @param int    $id
		 * @param string $name
		 * @param string $address
		 * @param string $phone
		 */
		public function __construct(
			public int    $id,
			public string $name,
			public string $address,
			public string $phone,
		) {}
	}
}

