<?php
namespace Corne;

class Options
{
	/** @var integer */
	private $iterations;

	/**
	 * @return int
	 */
	public function getIterations()
	{
		return $this->iterations;
	}

	/**
	 * @param int $iterations
	 * @return $this
	 */
	public function setIterations($iterations)
	{
		$this->iterations = $iterations;

		return $this;
	}
}