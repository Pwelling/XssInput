<?php
namespace Pwelling\XssInput;

use Illuminate\Support\Facades\Input;

class XssInput extends Input
{
	/**
	 * Get an item from the input data.
	 *
	 * This method is used for all request verbs (GET, POST, PUT, and DELETE)
	 *
	 * @param string|null $key
	 * @param mixed|null $default
     * @param bool|null $cleanse
	 * @return mixed
	 */
	public static function get($key = null, $default = null, $cleanse = null)
	{
		$value = static::$app['request']->input($key, $default);
		$globalCleanse = static::$app['config']->get('xssinput::xssinput.xss_filter_all_inputs');

		if ($cleanse === true || ($cleanse === null && $globalCleanse)) {
			$value = Security::xssClean($value);
		}

		return $value;
	}

	/**
	 * Get all of the input and files for the request.
	 *
	 * @param bool|null $cleanse
	 * @return array
	 */
	public static function all($cleanse = null)
	{
		$all = static::$app['request']->all();
		$global_cleanse = static::$app['config']->get('xssinput::xssinput.xss_filter_all_inputs');

		if ($cleanse === true || ($cleanse === NULL && $global_cleanse)) {
			foreach ($all as &$value) {
				$value = Security::xssClean($value);
			}
		}
		return $all;
	}
}
