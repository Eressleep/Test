<?php
namespace DOM\Enums\Address;


use DOM\Enums\Interface\Titleful;

enum Enum : string implements Titleful{
	const CITY = 'г.';
	case CITY_CODE = 'city';
	const STREET = 'улица';
	case STREET_CODE = 'street';
	const HOUSE = 'дом';
	case HOUSE_CODE = 'house';
	const OFFICE = 'офис';
	case OFFICE_CODE = 'officeOrApartment';

	public function getTitle(): string
	{
		return match ($this) {
			self::CITY_CODE   => self::CITY,
			self::STREET_CODE => self::STREET,
			self::HOUSE_CODE  => self::HOUSE,
			self::OFFICE_CODE => self::OFFICE,
			default           => throw new \Exception('Unexpected match value'),
		};
	}
}
