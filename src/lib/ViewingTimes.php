<?php

const SPLIT_LENGTH = 2;

function getInput(array $argv): array
{
    $argument = array_slice($argv, 1);
    // [[1, 30], [5, 25], ...]
    return array_chunk($argument, SPLIT_LENGTH);
}

function groupChannelViewingPeriods(array $inputs): array
{
    $chViewingPeriods = [];
    foreach ($inputs as $input) {
        $chan = $input[0];
        $min = $input[1];
        $mins = [$min];

        if (array_key_exists($chan, $chViewingPeriods)) {
            $mins = array_merge($chViewingPeriods[$chan], $mins);
        }

        $chViewingPeriods[$chan] = $mins;
    }
    return $chViewingPeriods;
}

function calculateTotalHour(array $chViewingPeriods): float
{
    $viewingTimes = [];
    foreach ($chViewingPeriods as $period) {
        $viewingTimes = array_merge($viewingTimes, $period);
    }
    $totalMin = array_sum($viewingTimes);

    // array_sum(array_merge(...$chViewingPeriods));

    return round($totalMin / 60, 1);
}

function display(array $chViewingPeriods): void
{
    $totalHour = calculateTotalHour($chViewingPeriods);
    echo $totalHour . PHP_EOL;
    foreach ($chViewingPeriods as $chan => $mins) {
        echo $chan . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

$inputs = getInput($_SERVER['argv']);
$chViewingPeriods = groupChannelViewingPeriods($inputs);
display($chViewingPeriods);
