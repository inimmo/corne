<?php
namespace Corne\Mutator;

use Corne\Candidate;
use Corne\Mutator;

class Litter implements Mutator
{
	protected $litterSize;
	protected $mutationChance;
	protected $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ ';

	/**
	 * @param int $litterSize
	 * @param int $mutationChance
	 */
	public function __construct($litterSize, $mutationChance)
	{
		$this->litterSize = $litterSize;
		$this->mutationChance = $mutationChance;
	}

	public function mutate(array $candidates)
	{
		$parent = $candidates[0];
		$return = [];

		for ($i = 0; $i < $this->litterSize; $i++)
		{
			$return[] = new Candidate($this->mutateString((string) $parent, $this->alphabet));
		}

		return $return;
	}

	private function mutateString($phrase, $alphabet = '')
	{
		$child = '';

		for ($a = 0; $a < strlen($phrase); $a++)
		{
			$child .= (mt_rand(1, 100) > $this->mutationChance)
				? $phrase[$a]
				: $alphabet[mt_rand(0, strlen($alphabet) - 1)];
		}

		return $child;
	}
}