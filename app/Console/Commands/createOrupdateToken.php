<?php

namespace App\Console\Commands;

use App\FinapiService\FinapidbService;
use Illuminate\Console\Command;

class createOrupdateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:createOrupdatetoken';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command createOrupdatetoken';

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
    public function handle(FinapidbService $finapidbService)
    {
        $finapidbService->createOrUpdateAccessToken();
    }
}
