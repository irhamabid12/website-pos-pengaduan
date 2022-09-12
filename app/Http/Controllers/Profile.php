<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function index(){
        
        if (Auth::guest()){
            return view('login');
           }
        return view('userProfile');
    }

    public function edit(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        // $data = DB::table('users')->where('id', auth()->user()->id)->get();
        // dd(auth()->user()->email);
        $name = auth()->user()->name;
        $username = auth()->user()->username;
        $nipPos = auth()->user()->nipPos;
        $jabatan = auth()->user()->jabatan;
        $fotoProfile = auth()->user()->fotoProfile;
        $created_at = auth()->user()->created_at;

        // dd($name);
        $editEmail = DB::table('users')->where('id', auth()->user()->id)
                                        ->update([
                                            'name' => auth()->user()->name,
                                            'username' => auth()->user()->username,
                                            'nipPos' => auth()->user()->nipPos,
                                            'jabatan' => auth()->user()->jabatan,
                                            'password' => auth()->user()->password,
                                            'fotoProfile' => auth()->user()->fotoProfile,
                                            'created_at' => auth()->user()->created_at,
                                            'email' => $request->emailBaru,
                                            'updated_at' => $current_date_time
                                        ]);
        $editPassword = DB::table('users')->where('id', auth()->user()->id)
                                        ->update([
                                            'password' => Hash::make($request->passwordBaru),
                                            'updated_at' => $current_date_time
                                        ]);
        $editProfile = DB::table('users')->where('id', auth()->user()->id)
                                        ->update([
                                            'name' => $request->nama,
                                            'username' => $request->username,
                                            'jabatan' => $request->jabatan,
                                            'nipPos' => $request->nippos,
                                            'updated_at' => $current_date_time
                                        ]);
        if ($editEmail){
            return back();
        }
    }
}
