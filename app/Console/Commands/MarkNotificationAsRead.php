<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
class MarkNotificationAsRead extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mark-as-read {id}';

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
        $notificationToMarkAsReadId = $this->argument('id');
        $mainUser = User::where('id','=',1)->first();
        if ($mainUser){
            $notificationToMarkAsRead = $mainUser->unreadNotifications->where('id',$notificationToMarkAsReadId)->first();
            if($notificationToMarkAsRead){
                $notificationToMarkAsRead->markAsRead();
            }
        }
    }
}
