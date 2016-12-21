<?php

class Autoloader
{
	public static function loader($class)
	{
		$filename = strtolower($class) . '.php';
		$file = $filename;
		if(!is_readable($file))
		{
			return false;
		}
		include $file;

	}
}

?>