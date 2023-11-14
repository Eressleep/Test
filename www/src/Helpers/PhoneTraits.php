<?php

namespace DOM\Helpers;


trait  PhoneTraits{
	private function phoneFormat($phone)
	{
		$phone = trim($phone);

		$res = preg_replace(
			array(
				'/[+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
				'/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
				'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
				'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
				'/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
				'/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
			),
			array(
				'8($2)$3-$4-$5',
				'8($2)$3-$4-$5',
				'8($2)$3-$4-$5',
				'8($2)$3-$4-$5',
				'8($2)$3-$4',
				'8($2)$3-$4',
			),
			$phone
		);

		return $res;
	}

	private function generatePhoneArray(string $phone){
		return [
			'countryNumber' => preg_replace('![^0-9]+!', '', $phone),
			'official'      => $this->phoneFormat($phone),
		];
	}


}
