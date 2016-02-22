<?php
namespace Corne\Tournament;

use Corne\Population;
use Corne\Tournament;

class Random implements Tournament
{
	protected $targetCount;

	/**
	 * @param $targetCount
	 */
	public function __construct($targetCount = 1)
	{
		$this->targetCount = $targetCount;
	}

	public function select(Population $population)
	{
		return $population->shuffle()->take($this->targetCount)->values()->all();
	}
}