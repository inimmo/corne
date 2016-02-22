<?php
namespace Corne\Mutator;

use Corne\Candidate;
use Corne\Mutator;

class BasicReplace implements Mutator
{
	protected $changes;

	/**
	 * @param int $changes
	 */
	public function __construct($changes = 1)
	{
		$this->changes = $changes;
	}

	public function mutate(array $candidates)
	{
		$return = [];

		foreach ($candidates as $candidate)
		{
			$mutant = new Candidate($this->changeCharacters((string) $candidate, $this->changes));
			$return[] = $mutant;
		}

		return $return;
	}

	protected function changeCharacters($str, $changes, $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ ')
	{
		for ($a = 0; $a < $changes; $a++)
		{
			$str[rand(0, strlen($str) - 1)] = substr(str_shuffle($alphabet), 0, 1);
		}

		return $str;
	}
}