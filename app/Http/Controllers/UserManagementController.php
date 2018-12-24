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
    
    public function index($orderBy = 'id' , $method = 'ASC')
    {
        $users = UserManagement::getAllUsers(15,$orderBy,$method);
        $formMethod = ($method == 'ASC')? 'DESC' : 'ASC';
        return view('userManagement/index', compact('users','formMethod','orderBy'));
    }
}
