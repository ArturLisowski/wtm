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
    
    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public static function editUser(int $id, string $name, string $email, $password)
    {
        $_user = new UserManagement($id);
        $_user->setName($name);
        $_user->setEmail($email);
        
        if ($password != null) {
            $_user->setPassword($password);
        }
        
        $_user->save();
    }
}
