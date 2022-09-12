<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;



class PengaturanBotTelegramController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return view('login');
           }
        return view('pengaturanBotTelegram');
    }

    public function database()
    {
        $users = DB::table('users_bot_telegram')->paginate(5);
        $message = DB::table('messages_response')->paginate(5);
        return View::make('pengaturanBotTelegram')
            ->with
            ([
                'users'=> $users,
                'messages'=>$message
            ]);
    }
    
}
