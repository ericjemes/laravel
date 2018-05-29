<?php
namespace App\Console;

use App\Util\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
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
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('inspire')->hourly();
         $schedule->command('inspire')->everyMinute();
         $schedule->command('test')->everyMinute();
    }
}

