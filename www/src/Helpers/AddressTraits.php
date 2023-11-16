<?php

namespace DOM\Helpers;

trait AddressTraits
{
	const separateCity = 'г.';
	const separateStreet = 'улица';
	const separateHouse = 'дом';
	const separateOffice = 'офис';

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
			if (self::separateCity == substr($item, 0, 3)) {
				$out['city'] = $item;
				continue;
			}
			if (self::separateStreet == $item) {
				$out['street'] = $str[$key + 1] == 'проспект' ? 'пр-т ' . $str[$key + 2] : $str[$key + 1];
				continue;
			}
			if (self::separateHouse == $item) {
				$out['house'] = $str[$key + 1];
				continue;
			}
			if (self::separateOffice == $item) {
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
	private function generateAddressArrayXml(string $address): array
	{
		$out = explode(self::separateOffice, $address);
		if (count($out) == 2) {
			$out[1] = self::separateOffice . ' ' . $out[1];
		}
		return $out;
	}
}
