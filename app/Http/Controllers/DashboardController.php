<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use function redirect;

class DashboardController extends Controller
{
    protected  $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function displayDashboard(Request $request){
        $user = User::where('id',1)->first();
       # dd(['user'=>$user,'read'=>$user->readNotifications,'unread'=>$user->unreadNotifications]);
        return view('dashboard',['user'=>$user,'read'=>$user->readNotifications,'unread'=>$user->unreadNotifications]);
    }

    public function createUser(){
       $this->userService->createRandomUser();
       return redirect()->to('/dashboard');
    }




}
