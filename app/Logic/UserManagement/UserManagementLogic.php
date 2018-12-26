<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 24.12.2018
 * Time: 15:57
 */

namespace App\Logic\UserManagement;


use App\UserManagement;

class UserManagementLogic extends UserManagement
{
    /**
     * @param int $userId
     */
    public static function changeActive(int $userId)
    {
        $_user = new UserManagement($userId);
        $_user->setActive(!$_user->getActive());
        $_user->save();
    }
    
    /**
     * @param int $userId
     */
    public static function changeAdmin(int $userId)
    {
        $_user = new UserManagement($userId);
        $_user->setAdmin(!$_user->getAdmin());
        $_user->save();
    }
}