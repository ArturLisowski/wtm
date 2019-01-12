<?php
/**
 * Created by PhpStorm.
 * User: artur
 * Date: 12.01.2019
 * Time: 17:10
 */

namespace App\Logic\WorkingTime;




use App\WorkingTime;
use DateTime;

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
    
    public static function saveEndTime($userId, $endTime)
    {
        $_workingTime = WorkingTime::getUserTimeFromDay($userId, date('y-m-d'));
        empty($startTime)? $_workingTime->setEndTime(date('H:i:00')):$_workingTime->setEndTime($endTime);
        
        $startTime = new DateTime($_workingTime->getStartTime());
        $endTime = new DateTime($_workingTime->getEndTime());
       
       
        $_workingTime -> setWorkingTime(($startTime->diff($endTime)->format('%H:%i:00')));
        $_workingTime ->save();
    }
    
}