<?php

namespace App\Http\Controllers;

use App\Log;
use App\Logic\UserManagement\UserManagementLogic;
use App\User;
use App\UserManagement;
use Illuminate\Http\Request;


class UserManagementController extends Controller
{
    const PAGINATE_VALUE = 15;
    
    /**
     * UserManagementController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    
    /**
     * @param string $orderBy
     * @param string $method
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $orderBy = 'id', string $method = 'ASC') //todo validateInput
    {
        $users = UserManagement::getAllUsers(UserManagementController::PAGINATE_VALUE, $orderBy, $method);
        $formMethod = ($method == 'ASC') ? 'DESC' : 'ASC';
        $logs = Log::getLogs('userManagement', UserManagementController::PAGINATE_VALUE);
        return view('userManagement/index', compact('users', 'formMethod', 'orderBy', 'logs'));
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setActive(int $id) //todo validateInput
    {
        UserManagementLogic::changeActive($id);
        return redirect(route('userManagement'));
    }
    
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setAdmin(int $id)
    {
        UserManagementLogic::changeAdmin($id);
        return redirect(route('userManagement'));
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:32',
            'email' => 'required|email|max:64',
            'password' => 'nullable|min:6|max:32',
            'rePassword' => 'same:password'
        ]);
        
        UserManagementLogic::editUser($request->input('id'), $request->input('name'), $request->input('email'), $request->input('password'));
        return redirect(route('userManagement'));
    }
}
