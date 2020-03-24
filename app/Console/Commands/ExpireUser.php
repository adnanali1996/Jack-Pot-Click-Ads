<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpireUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Expire:ExpireUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is Used to Expire The User';

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
        $today = Carbon::today();
        $users = User::where('expiry_date', '>', $today->format('Y-m-d'))->get();;
        foreach ($users as $user) {
            $user->status = 0;
            $user->save();
        }
    }
}