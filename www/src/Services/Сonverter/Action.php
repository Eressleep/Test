<?php

namespace DOM\Services\Сonverter;

use DOM\Presentation\Json\DataFormat;
use DOM\Services\Collector\Input;
use DOM\Services\Reader\File;
use DOM\Validators\CheckFile;
use DOM\Validators\CheckInputParam;

class Action
{
	protected static $instance;

	const XMLFile = 'text.xml';
	const JsonFile = 'text.json';

	public function __construct() {}

	private function __clone(): void {}

	/**
	 * @return void
	 */
	private function __wakeup(): void {}

	public static function getInstance()
	{
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * @param array $data
	 *
	 * @return void
	 */
	public function run(array $data) : void
	{
		try {
			$this->prepareData($data);
		} catch (\Throwable $exception) {
			print_r($exception);
		}
	}

	private function prepareData(array $data) : void {
		$out = CheckInputParam::checkKey($data);
		if(CheckFile::findFile($out))
		{
			$data = (new Input())->createFormData(File::read($out));
			$json = (new DataFormat($data))->getData();
			$xml = (new \DOM\Presentation\Xml\DataFormat($data))->getData();
			\DOM\Services\Save\File::save($json, self::JsonFile);
			\DOM\Services\Save\File::save($xml, self::XMLFile);
		}
	}


}
