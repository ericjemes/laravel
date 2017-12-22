<?php

namespace App\Console;

use App\Util\Console\Schedule;
//use App\Util\Console\Kernel as ConsoleKernel;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\Inspire::class,
         Commands\JobScript::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function handle()
    {
        $schedule = new Schedule();
        $schedule->command('inspire')->everyMinute();
        $schedule->command('test')->cron('0 0 12 * *');
        echo "<pre>";
        print_r($schedule);
        exit;
    }
}
