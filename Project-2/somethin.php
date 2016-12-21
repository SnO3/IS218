<?php

class somethin
{
	private $arr;

	function __construct()
	{
		$arr = array();
	}

	public function doot($var)
	{
		$this->arr[] = $var;
	}

	public function send()
	{
		foreach($this->arr as $val)
		{
			echo $val;
		}

		echo "\n";
	} 
}

?>