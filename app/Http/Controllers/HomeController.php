<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleMake;
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
        $makes = VehicleMake::all();
        return view('serrvicerequest', compact('makes'));
    }
}
