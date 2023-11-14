<?php

namespace DOM\Helpers;

trait AddressTraits
{
	private function generateAddressArray(string $address): array
	{
		$str = explode(' ', $address);
		$out = [
			'city'              => null,
			'street'            => null,
			'house'             => null,
			'officeOrApartment' => null,
		];
		foreach ($str as $key => $item) {
			if ('г.' == substr($item, 0, 3)) {
				$out['city'] = $item;
				continue;
			}
			if ('улица' == $item) {
				$out['street'] = $str[$key + 1] == 'проспект' ? 'пр-т ' . $str[$key + 2] : $str[$key + 1];
				continue;
			}
			if ('дом' == $item) {
				$out['house'] = $str[$key + 1];
			}
			if ('офис' == $item) {
				$out['officeOrApartment'] = $str[$key + 1];
			}
		}
		return $out;
	}

	/**
	 * @param string $address
	 *
	 * @return string[]
	 */
	private function generateAddressArrayXml(string $address) : array {
		$out =  explode('офис', $address);
		if(count($out) == 2){
			$out[1] = 'офис '. $out[1];
		}
		return $out;
	}
}
