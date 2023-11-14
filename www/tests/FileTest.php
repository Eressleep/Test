<?php

declare(strict_types=1);

use DOM\Services\Сonverter\Action;
use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{
	public function testFile(): void
	{
		$argv = [
			'script.php',
			'PATH=input/offices.txt',
		];
		(new Action)->run($argv);
		$this->assertSame($argv, $argv);
	}

	public function testFileNoParams(): void
	{
		$argv = [
			'script.php',
			'PATH=input/offices.txt',
		];
		$argv_1 = [
			'script.php',
		];
		(new Action)->run($argv);
		$this->assertSame($argv, $argv_1);
	}
}

