<?php

namespace App\Http\Controllers;

use App\Logic\UserManagement\UserManagementLogic;
use App\UserManagement;


class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(string $orderBy = 'id' ,string $method = 'ASC') //todo validateInput
    {
        $users = UserManagement::getAllUsers(15,$orderBy,$method);
        $formMethod = ($method == 'ASC')? 'DESC' : 'ASC';
        return view('userManagement/index', compact('users','formMethod','orderBy'));
    }
    
    public function setActive(int $id) //todo validateInput
    {
        UserManagementLogic::changeActive($id);
        return redirect(route('userManagement'));
    }
    
}
