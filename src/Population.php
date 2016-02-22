<?php
namespace Corne;

use Illuminate\Support\Collection;

class Population extends Collection
{
	protected $creationFunction;
	protected $fitnessFunction;

	/**
	 * @param callable $creationFunction
	 * @param callable $fitnessFunction
	 * @param $initialSize
	 */
	public function initialise(Callable $creationFunction, Callable $fitnessFunction, $initialSize)
	{
		$this->creationFunction = $creationFunction;
		$this->fitnessFunction = $fitnessFunction;

		for ($i = 0; $i < $initialSize; $i++)
		{
			$this->createInitialCandidate();
		}
	}

	public function hasFitnessApex()
	{

	}

	protected function createInitialCandidate()
	{
		$candidate = call_user_func($this->creationFunction);
		$this->push($candidate);
	}

	public function fittest()
	{
		return $this
			->sortBy($this->getFitnessFunction())
			->take(1);
	}

	/**
	 * @param Candidate[] $candidates
	 */
	public function newGeneration(array $candidates)
	{
		$this->items = $candidates;
	}

	public function getFitnessFunction()
	{
		return $this->fitnessFunction;
	}

	public function __toString()
	{
		$output = '';

		foreach ($this->items as $item)
		{
			$output .= (((string) $item) . PHP_EOL);
		}

		return $output;
	}
}