<?php
require_once 'vendor/autoload.php';

$target = 'FLIPMODE IS THE GREATEST';

$population = new \Corne\Population();

$population->initialise(
	function () use ($target) {
		$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ ';
		$targetLength = strlen($target);
		$str = substr(str_shuffle(str_repeat($alphabet, $targetLength)), 0, $targetLength);
		return new \Corne\Candidate($str);
	},

	function ($candidate) use ($target) { return levenshtein($candidate, $target, 1000, 1, 1000); },

	1
);

$algorithm = new \Corne\Algorithm(
	$population,
	new \Corne\Tournament\Fittest(1),
	# new \Corne\Mutator\Multiple([
		new \Corne\Mutator\Litter(100, 5),
		# new \Corne\Mutator\BasicReplace(2),
		# new \Corne\Mutator\Combining(),
	# ]),
	$options = (new \Corne\Options())->setIterations(100)
);

$algorithm->run();