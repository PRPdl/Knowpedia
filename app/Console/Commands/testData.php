<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class testData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:testFunc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tests the handle function in testData';

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
     * @return int
     */
    public function handle()
    {
        $user = [
            'amount' => 2500,
            'type' => 'Bank'
        ];
    }
}
