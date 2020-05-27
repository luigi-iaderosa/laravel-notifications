<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 27/05/20
 * Time: 16.50
 */

namespace App\Services;

use App\User;
use App\Notifications\UserCreatedNotification;
class UserService
{
    public function createRandomUser(){
        $mainUser = User::where('id','=',1)->first();
        $createdUser = factory(User::class)->create();
        if ($mainUser){
            $mainUser->notify(new UserCreatedNotification());
        }
        return $createdUser;

    }
}