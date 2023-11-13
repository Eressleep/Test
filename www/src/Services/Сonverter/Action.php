<?php

namespace DOM\Services\Сonverter;

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
			$data = File::read($out);
		}


		exit();
	}


}
