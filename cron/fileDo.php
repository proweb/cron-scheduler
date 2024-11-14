<?php
// Filename MUST have Do.php as suffix
use Crunz\Schedule;

require dirname(__DIR__) . '/vendor/autoload.php';

# Init
$schedule = new Schedule();
$storage = dirname(__DIR__) . '/storage';
$timestamp = time();


$task = $schedule->run(function () use ($storage, $timestamp) {
    file_put_contents("{$storage}/{$timestamp}.txt", $timestamp);
});
$task
    ->everyFiveMinutes()
    ->description('Создание файла каждые 5 минут.');

return $schedule;