<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Log extends Model
{
    private $message;
    private $url;
    private $level;
    private $userId;
    
    const LEVEL_DEBUG = 1;
    const LEVEL_INFO = 2;
    const LEVEL_WARNING = 3;
    const LEVEL_ERROR = 4;
    const LEVEL_EXCEPTION = 5;
    
    /**
     * Log constructor.
     * @param string $message
     * @param string $url
     * @param int $level
     */
    public function __construct(string $message, string $url, int $level = Log::LEVEL_EXCEPTION)
    {
        $this->message = $message;
        $this->url = $url;
        $this->level = $level;
        $this->userId = Auth::user()->id;
        $this->save();
    }
    
    /**
     * @param array $options
     * @return bool|void
     */
    public function save(array $options = [])
    {
        DB::table('logs')->insert(
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'message' => $this->message,
                'url' => $this->url,
                'level' => $this->level,
                'userId' => $this->userId
            ]
        );
        
    }
}
