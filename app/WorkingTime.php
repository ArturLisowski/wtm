<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WorkingTime extends Model
{
    private $id;
    private $userId;
    private $data;
    private $start;
    private $end;
    private $workingTime;
    
    public function __construct(int $id = 0)
    {
        if ($id > 0) {
            $data = DB::table('working_times')
                ->select('*')
                ->where('id', '=', $id)
                ->get();
            
            $this->id = $data[0]->id;
            $this->userId = $data[0]->userId;
            $this->data = $data[0]->data;
            $this->start = $data[0]->start;
            $this->end = $data[0]->end;
            $this->workingTime = $data[0]->workingTime;
        }
    }
    
    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param $id
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
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
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->start;
    }
    
    /**
     * @param $endTime
     */
    public function setEndTime($endTime)
    {
        $this->end = $endTime;
    }
    
    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->end;
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
    
    /**
     * @param array $options
     * @return bool|void
     */
    public function save(array $options = [])
    {
        if ($this->id > 0) {
            DB::table('working_times')
                ->where('id', $this->id)
                ->update([
                    'updated_at' => date('Y-m-d H:i:s'),
                    'userId' => $this->userId,
                    'data' => $this->data,
                    'start' => $this->start,
                    'end' => $this->end,
                    'workingTime' => $this->workingTime
                ]);
        } else {
            DB::table('working_times')
                ->insert(
                    [
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'userId' => $this->userId,
                        'data' => $this->data,
                        'start' => $this->start,
                        'end' => $this->end,
                        'workingTime' => $this->workingTime
                    ]
                );
        }
    }
    
    /**
     * @param int $userId
     * @param null $date
     * @return WorkingTime
     */
    public static function getUserTimeFromDay(int $userId = 0, $date = null)
    {
        if ($userId > 0 && $date != null) {
            $data = DB::table('working_times')
                ->select('*')
                ->where('userId', '=', $userId)
                ->where('data', '=', $date)
                ->get();
            $_workingTime = new WorkingTime();
            
            if (!isset($data[0])) {
                return $_workingTime;
            }
            
            $_workingTime->setId($data[0]->id);
            $_workingTime->setUserId($data[0]->userId);
            $_workingTime->setData($data[0]->data);
            $_workingTime->setStartTime($data[0]->start);
            $_workingTime->setEndTime($data[0]->end);
            $_workingTime->setWorkingTime($data[0]->workingTime);
            
            return $_workingTime;
        }
        
        return new WorkingTime();
    }
    
    /**
     * @param int $userId
     * @param int $days
     * @return array|null
     */
    public static function getLastWorkingDays(int $userId, int $days = 1)
    {
        if ($userId > 0) {
            $data = DB::table('working_times')
                ->select('*')
                ->where('userId', '=', $userId)
                ->limit($days)
                ->get();
            
            
            if (!isset($data[0])) {
                return null;
            }
            
            $output = [];
            
            foreach ($data as $d) {
                $_workingTime = new WorkingTime();
                $_workingTime->setId($data[0]->id);
                $_workingTime->setUserId($data[0]->userId);
                $_workingTime->setData($data[0]->data);
                $_workingTime->setStartTime($data[0]->start);
                $_workingTime->setEndTime($data[0]->end);
                $_workingTime->setWorkingTime($data[0]->workingTime);
                $output[] = $d;
            }
            
            return $output;
        }
        
        return null;
    }
}
