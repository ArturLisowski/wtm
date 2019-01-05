<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingTime extends Model
{
    private $userId;
    private $data;
    private $start;
    private $end;
    private $workingTime;
    
    /**
     * @param int $userId
     */
    public function setUserId(int $userId)
    {
        $this->userId = $userId;
    }
    
    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }
    
    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    
    /**
     * @param $startTime
     */
    public function setStartTime($startTime)
    {
        $this->start = $startTime;
    }
    
    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->end = $endTime;
    }
    
    /**
     * @param $workingTime
     */
    public function setWorkingTime($workingTime)
    {
        $this->workingTime = $workingTime;
    }
    
    /**
     * @return mixed
     */
    public function getWorkingTime()
    {
        return $this->workingTime;
    }
}
