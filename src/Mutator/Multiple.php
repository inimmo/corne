<?php
namespace Corne\Mutator;

use Corne\Candidate;
use Corne\Mutator;

class Multiple implements Mutator
{
	protected $mutators;

	public function __construct(array $mutators)
	{
		$this->mutators = $mutators;
	}

	public function mutate(array $candidates)
	{
		foreach ($this->mutators as $mutator)
		{
			$candidates = $mutator->mutate($candidates);
		}

		return $candidates;
	}
}