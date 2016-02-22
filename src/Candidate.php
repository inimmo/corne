<?php
namespace Corne;

class Candidate
{
	protected $string;

	public function __construct($string)
	{
		$this->string = $string;
	}

	public function __toString()
	{
		return $this->string;
	}
}