<?php

namespace App\Console\Commands;

use App\Events\CreatedUserEvent;
use App\Notifications\UserCreatedNotification;
use App\User;
use function event;
use function factory;
use Illuminate\Console\Command;

class CreateNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create-user';

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
            $createdUser = factory(User::class)->create();
            $mainUser->notify(new UserCreatedNotification());
            event(new CreatedUserEvent());
        }

    }
}
