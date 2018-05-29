<?php

namespace App\Console\Commands;

//use Illuminate\Console\Command;
//use Illuminate\Foundation\Inspiring;
//use Log;

class Inspire
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    static $signature = 'inspire';

    /**
     * The console command description.
     *
     * @var string
     */
    static $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "<pre>";
        print_r('handle');
        exit;
        $time = date('Y-m-d H:i:s');
        Log::info('Showing user profile for user: ' . getmypid() .$time);
//        sleep(70);
//        Log::info('Showing user profile for user: '. getmypid()  . $time);
        //        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }
}
