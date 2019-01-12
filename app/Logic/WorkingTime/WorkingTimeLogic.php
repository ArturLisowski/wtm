<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 12.01.2019
 * Time: 17:10
 */

namespace App\Logic\WorkingTime;




use App\WorkingTime;

class WorkingTimeLogic
{
    /**
     * @param $userId
     * @param $startTime
     */
    public static function saveStartTime($userId, $startTime)
    {
        $_workingTime =  new WorkingTime();
        $_workingTime->setUserId($userId);
        $_workingTime->setData(date('y-m-d'));
        empty($startTime)? $_workingTime->setStartTime(date('H:i:00')):$_workingTime->setStartTime($startTime);
        $_workingTime->save();
    }
    
    
}