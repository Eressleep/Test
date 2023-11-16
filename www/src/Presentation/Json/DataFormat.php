<?php


namespace DOM\Presentation\Json;

use DOM\Helpers\AddressTraits;
use DOM\Helpers\PhoneTraits;
use DOM\Presentation\Abstract\Data;
use DOM\Presentation\Interface;

class DataFormat extends Data implements Interface\InterfaceAdapter
{
	use PhoneTraits, AddressTraits;

	public function getData() : string
	{
		$out = [];
		foreach ($this->report as $item) {
			$out[] = [
				'type'       => self::officeType,
				'id'         => $item->id,
				'attributes' => [
					'name'    => $item->name,
					'address' => $this->generateAddressArray($item->address),
					'phone'   => $this->generatePhoneArray($item->phone),
				],
			];
		}
		$answer['data'] = $out;
		return json_encode($answer, JSON_UNESCAPED_UNICODE);
	}



}
