<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 24.12.2018
 * Time: 15:57
 */

namespace App\Logic\UserManagement;


use App\Log;
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
        
        $message = $_user->getName();
        $message .= ' Active : ';
        $message .= $_user->getActive() ?: '0';
        new Log($message, url()->previous(), LOG::LEVEL_INFO);
    }
    
    /**
     * @param int $userId
     */
    public static function changeAdmin(int $userId)
    {
        $_user = new UserManagement($userId);
        $_user->setAdmin(!$_user->getAdmin());
        $_user->save();
        
        $message = $_user->getName();
        $message .= ' Admin : ';
        $message .= $_user->getAdmin() ?: '0';
        new Log($message, url()->previous(), LOG::LEVEL_INFO);
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
        
        $message = "Eddited User ";
        $name != $_user->getName() ? $message .= $_user->getName() . ' => ' . $name . ', ' : $message .= $name . ', ';
        $email != $_user->getEmail() ? $message .= $_user->getEmail() . ' => ' . $email . ',' : $message .= $email . ', ';
        
        $_user->setName($name);
        $_user->setEmail($email);
        
        if ($password != null) {
            $_user->setPassword($password);
            $message .= 'Password was changed';
        } else {
            $message .= 'Password wasn\'t changed';
        }
        
        $_user->save();
        new Log($message, url()->previous(), LOG::LEVEL_INFO);
    }
}
