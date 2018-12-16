<?php

namespace App\Http\Controllers;

use App\UserManagement;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = UserManagement::getAllUsers(15);
        return view('userManagement/index', compact('users'));
    }
}
