<?php

namespace App\Http\Controllers;

use App\WorkingTime;
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
        $_workingTime = WorkingTime::getUserTimeFromDay(Auth::user()->id, date('y-m-d'));
        
        return view('home')->with('_workingTime', ['startTime' => $_workingTime->getStartTime(), 'endTime' => $_workingTime->getEndTime(), $_workingTime->getWorkingTime()]);
    }
}
