<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SendUsersList;
use DB;
use Carbon\Carbon;
use App\Console\Commands\DateTime;

class RegisterUsersList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $today =Carbon::now()->toDateString();
        $current_registered_users = DB::table('users')->whereDate('created_at', $today)->get()->toArray();
        $email = new SendUsersList($current_registered_users);
        Mail::to('novalb65@gmail.com')->send($email);
    }
}
