<?php
namespace Corne;

class Algorithm
{
	/** @var Population */
	protected $population;

	/** @var Tournament */
	protected $tournament;

	/** @var Mutator */
	protected $mutator;

	/** @var Options */
	protected $options;

	/**
	 * @param Population $population
	 * @param Tournament $tournament
	 * @param Mutator $mutator
	 * @param Options $options
	 */
	public function __construct(Population $population, Tournament $tournament, Mutator $mutator, Options $options)
	{
		$this->population = $population;
		$this->tournament = $tournament;
		$this->mutator = $mutator;
		$this->options = $options;
	}

	public function run()
	{
		echo $this->population, PHP_EOL;

		for ($i = 0; $i < $this->options->getIterations(); $i++)
		{
			echo $i, ")", PHP_EOL;

			$crossoverCandidates = $this->tournament->select($this->population);
			$newCandidates = $this->mutator->mutate($crossoverCandidates);

			$nextGeneration = $this->population
				->merge($newCandidates)
				->sortBy($this->population->getFitnessFunction())
				->take($this->population->count());

			$this->population->newGeneration($nextGeneration->all());

			echo $this->population->fittest();
		}

		echo $this->population->values()[0], PHP_EOL;
	}
}