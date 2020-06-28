<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::join('mahasiswa as m','m.id_user','=','users.id')
            ->leftJoin('pembayaran as p','p.id_mahasiswa','=','m.id_user')
            ->where('users.id',Auth::user()->id)->first();
        $dataView = [
            'user' =>$user
        ];
        return view('home',$dataView);
    }
}
