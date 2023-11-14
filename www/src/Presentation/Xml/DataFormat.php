<?php


namespace DOM\Presentation\Xml;

use DOM\Helpers\AddressTraits;
use DOM\Helpers\PhoneTraits;
use DOM\Presentation\Interface;
use LaLit\Array2XML;
use LaLit\XML2Array;

class DataFormat implements Interface\InterfaceAdapter
{
	use PhoneTraits, AddressTraits;

	private $report;

	const phoneType = 'phone';

	public function __construct($report)
	{
		$this->report = $report;
	}

	public function getData()
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
