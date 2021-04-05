
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
    $channelViewingPeriods = [];
    foreach ($inputs as $input) {
        $chan = $input[0];
        $min = $input[1];
        $mins = [$min];

        if (array_key_exists($chan, $channelViewingPeriods)) {
            $mins = array_merge($channelViewingPeriods[$chan], $mins);
        }

        $channelViewingPeriods[$chan] = $mins;
    }
    return $channelViewingPeriods;
}

function calculateTotalHour(array $channelViewingPeriods): float
{
    $viewingTimes = [];
    foreach ($channelViewingPeriods as $period) {
        $viewingTimes = array_merge($viewingTimes, $period);
    }
    $totalMin = array_sum($viewingTimes);

    // array_sum(array_merge(...$channelViewingPeriods));

    return round($totalMin / 60, 1);
}

function display(array $channelViewingPeriods): void
{
    $totalHour = calculateTotalHour($channelViewingPeriods);
    echo $totalHour . PHP_EOL;
    foreach ($channelViewingPeriods as $chan => $mins) {
        echo $chan . ' ' . array_sum($mins) . ' ' . count($mins) . PHP_EOL;
    }
}

$inputs = getInput($_SERVER['argv']);
$channelViewingPeriods = groupChannelViewingPeriods($inputs);
display($channelViewingPeriods);