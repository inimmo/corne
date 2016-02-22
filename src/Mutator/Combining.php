<?php
namespace Corne\Mutator;

use Corne\Candidate;
use Corne\Mutator;

class Combining implements Mutator
{
	public function mutate(array $candidates)
	{
		$targetLength = strlen((string) $candidates[0]);
		$chunkLength = intval($targetLength / count($candidates));

		$combinedString = '';

		$i = 0;

		while (strlen($combinedString) < $targetLength)
		{
			$chunkFrom = $candidates[$i % count($candidates)];
			$combinedString .= substr((string) $chunkFrom, strlen($combinedString), $chunkLength);

			$i++;
		}

		return new Candidate($combinedString);
	}
}