<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkingTimeController extends Controller
{
    /**
     * WorkingTimeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    
    }
    
}
