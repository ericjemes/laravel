<?php

namespace App\Console\Commands;


class JobScript
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    static $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    static $description = 'i am a good man';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('Haha: ' . getmypid()  .date('Y-m-d H:i:s'));
    }
}
