<?php

namespace DOM\Services\Collector;
use DOM\DTO\Output\Data;

class Input{

	public function createFormData(array $data) : array
	{

		$data = $this->separeteData($data);
		$out = array_map(fn($item) => new Data(
			id     : trim($item[0][1]),
			name   : trim($item[1][1]),
			address: trim($item[2][1]),
			phone  : trim($item[3][1])
		), $data);
		return $out;
	}

	private function separeteData(array $data) : array{
		foreach ($data as &$item)
		{
			foreach ($item as &$value)
			{
				$value = explode(':', $value);
			}
		}
		return $data;
	}


}
