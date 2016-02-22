<?php
namespace Corne;

interface Mutator
{
	/**
	 * @param Candidate[] $candidates
	 * @return Candidate[]
	 */
	public function mutate(array $candidates);
}