<?php
namespace DOM\Patterns;

abstract  class Singleton{
	protected static $instance;

	public function __construct() {}

	private function __clone(): void {}

	/**
	 * @return void
	 */
	private function __wakeup(): void {}

	public static function getInstance()
	{
		$class = get_called_class();
		if (!isset(self::$instance[$class])) {
			self::$instance[$class] = new $class();
		}
		return self::$instance[$class];
	}

}
