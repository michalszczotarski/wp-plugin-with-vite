<?php

namespace App\Traits;
 
trait Singleton
{
    	/**
	 * Protected class constructor to prevent direct object creation
	 *
	 * This is meant to be overridden in the classes which implement
	 * this trait. This is ideal for doing stuff that you only want to
	 * do once, such as hooking into actions and filters, etc.
	 */
	protected function __construct() {
	}

	/**
	 * Prevent object cloning
	 */
	final protected function __clone() {
	}
    
    final public static function get_instance()
    {
        static $instance = [];

        $called_class = get_called_class();

        if (!isset($instance[$called_class])) {
            $instance[$called_class] = new $called_class();
        }

		return $instance[$called_class];
    }
}
