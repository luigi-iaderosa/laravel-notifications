<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class ShowMainUserNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'su-notifications';

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
     * @return mixed
     */
    public function handle()
    {
        $mainUser = User::where('id','=',1)->first();
        if ($mainUser){

            dump(['unread'=>$mainUser->unreadNotifications,'read'=>$mainUser->readNotifications,'all'=>
                $mainUser->notifications]);
        }
    }
}
