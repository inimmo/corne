<?php
namespace Corne;

interface Tournament
{
	/**
	 * @param Population $population
	 * @return Candidate[]
	 */
	public function select(Population $population);
}