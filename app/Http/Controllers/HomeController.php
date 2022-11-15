<?php

namespace App\Http\Controllers;
use App\Models\PerguruanTinggi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

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
        return view('website.home');
    }

    public function perguruan()
    {
        return view('website.perguruan');
    }
    
    public function json()
    {
        $data = PerguruanTinggi::get();
        return DataTables::of($data)
        ->make(true);
    }

    public function peta()
    {   
        return view('website.peta');
    }

    public function ahp(Request $request) 
    {
        $userIp = $request->ip();
        $locationData = \Location::get($userIp);
        $data = PerguruanTinggi::get();
        return view('website.hasil-ahp');
    }

}
