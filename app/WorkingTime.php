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
}
