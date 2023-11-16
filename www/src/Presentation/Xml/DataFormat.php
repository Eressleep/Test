<?php


namespace DOM\Presentation\Xml;

use DOM\Helpers\AddressTraits;
use DOM\Helpers\PhoneTraits;
use DOM\Presentation\Abstract\Data;
use DOM\Presentation\Interface;
use LaLit\Array2XML;

class DataFormat extends Data implements Interface\InterfaceAdapter
{
	use PhoneTraits, AddressTraits;

	/**
	 * @throws \Exception
	 */
	public function getData() : string
	{
		$out = [];
		foreach ($this->report as $key => $item) {
			$address = $this->generateAddressArrayXml($item->address);
			$out['company'][$key]['company-id'] = $item->id;
			$out['company'][$key]['name'] = [
				'@attributes' => [
					'lang' => 'ru',
				],
				'@value'      => $item->name,
			];
			$out['company'][$key]['phone'] = [
				'type'   => [
					'@value' => self::phoneType,
				],
				'number' => [
					'@value' => $this->phoneFormat($item->phone),
				],
			];

			if (count($address) == 2) {
				$out['company'][$key]['address-add'] = [
					'@attributes' => [
						'lang' => 'ru',
					],
					'@value'      => $address[1],
				];
			}
		}

		return Array2XML::createXML(
			'companies',
			$out
		)->saveXML();
	}
}
