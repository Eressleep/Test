<?php
namespace DOM\Presentation\Abstract;


abstract class Data{
	protected $report;

	const phoneType = 'phone';
	const officeType = 'office';

	public function __construct($report)
	{
		$this->report = $report;
	}
}
