<?php

namespace App\Console\Commands;

use App\Advertise;
use App\UserAdvertise;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RenewAdds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Renew:RenewAdd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command is used to Renew All Advertises';

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
        //
        //Advertise::all();
        // echo "Cron Is Running";

        $affected = DB::table('advertises')->update(array('date' => date('Y-m-d')));
        UserAdvertise::truncate();
        echo "Cron is Running";
    }
}