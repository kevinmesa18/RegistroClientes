<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Client;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::all()->count();
        $users = User::all()->count();
        $clients = Client::all()->count();
        return view('home', compact("users","cities","clients"));
    }
}
