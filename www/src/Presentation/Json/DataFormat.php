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
		$out['data'] = array_map(fn($item) => [
			'type'       => self::officeType,
			'id'         => $item->id,
			'attributes' => [
				'name'    => $item->name,
				'address' => $this->generateAddressArray($item->address),
				'phone'   => $this->generatePhoneArray($item->phone),
			],
		], $this->report);
		return json_encode($out, JSON_UNESCAPED_UNICODE);
	}



}
