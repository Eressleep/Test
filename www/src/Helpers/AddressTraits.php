<?php

namespace DOM\Helpers;

use DOM\Enums\Address\Enum;

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
			Enum::CITY_CODE->value   => null,
			Enum::STREET_CODE->value => null,
			Enum::HOUSE_CODE->value  => null,
			Enum::OFFICE_CODE->value => null,
		];
		foreach ($str as $key => $item) {
			if (Enum::from('city')->getTitle() == substr($item, 0, 3)) {
				$out['city'] = $item;
				continue;
			}
			if (Enum::from('street')->getTitle() == $item) {
				$out['street'] = $str[$key + 1] == 'проспект' ? 'пр-т ' . $str[$key + 2] : $str[$key + 1];
				continue;
			}
			if (Enum::from('house')->getTitle() == $item) {
				$out['house'] = $str[$key + 1];
				continue;
			}
			if (Enum::from('officeOrApartment')->getTitle() == $item) {
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
		$out = explode(Enum::from('officeOrApartment')->getTitle(), $address);
		if (count($out) == 2) {
			$out[1] = Enum::from('officeOrApartment')->getTitle() . ' ' . $out[1];
		}
		return $out;
	}
}
