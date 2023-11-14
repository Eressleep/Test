<?php

namespace DOM\Services\Сonverter;

use DOM\Presentation\Json\DataFormat;
use DOM\Services\Collector\Input;
use DOM\Services\Reader\File;
use DOM\Validators\CheckFile;
use DOM\Validators\CheckInputParam;

class Action
{
	public function run(array $data)
	{
		try {
			$this->prepareData($data);
		} catch (\Throwable $exception) {
			print_r($exception);
		}
	}

	private function prepareData(array $data) {
		$out = CheckInputParam::checkKey($data);
		if(CheckFile::findFile($out))
		{
			$data = (new Input())->createFormData(File::read($out));
			$json = (new DataFormat($data))->getData();
			$xml = (new \DOM\Presentation\Xml\DataFormat($data))->getData();
			\DOM\Services\Save\File::save($json, 'text.json');
			\DOM\Services\Save\File::save($xml, 'text.xml');
		}
	}


}
