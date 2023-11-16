<?php

namespace DOM\Services\Collector;
use DOM\DTO\Output\Data;

class Input{

	public function createFormData(array $data) : array
	{
		return array_map(fn($item) => new Data(
			id     : $item[0][1],
			name   : $item[1][1],
			address: $item[2][1],
			phone  : $item[3][1]
		), $this->separeteData($data));
	}

	private function separeteData(array $data) : array{
		foreach ($data as &$item)
		{
			foreach ($item as &$value)
			{
				$value = array_map(
					fn($item) => trim($item), explode(':', $value),
					                          explode(':', $value)
				);
			}
		}
		return $data;
	}
}
