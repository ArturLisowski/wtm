<?php

namespace App\Http\Controllers;

use App\Logic\WorkingTime\WorkingTimeLogic;
use App\WorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkingTimeController extends Controller
{
    /**
     * WorkingTimeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function saveStartTime(Request $request)
    {
        WorkingTimeLogic::saveStartTime(Auth::user()->id, $request->input('startTime'));
        return redirect(route('home'));
    }
    
    public function saveEndTime(Request $request)
    {
        WorkingTimeLogic::saveEndTime(Auth::user()->id, $request->input('endTime'));
        return redirect(route('home'));
    }
}
