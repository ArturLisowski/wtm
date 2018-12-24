<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserManagement extends Model
{
    private $id;
    private $name;
    private $email;
    private $password;
    
    public function __construct($id)
    {
        $id->validate([
            'id' => 'integer',
        ]);
        
        $this->id = $id;
        
        $user = DB::table('users')
            ->where('id', $this->id)
            ->get();
        
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $name->validate([
            'name' => 'required|string|max:25',
        ]);
        
        $this->name = $name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $email->validate([
            'email' => 'required|email|max:50',
        ]);
        
        $this->email = $email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $password->validate([
            'password' => 'required|max:25',
        ]);
        
        $this->password = $password;
    }

//    public function save()
//	{
//        DB::table('users')
//           ->where('id', $this->id)
//           ->update(['name' => $this->name])
//           ->update(['surname' => $this->surname])
//           ->update(['email' => $this->email])
//           ->update(['password' => $this->password]);
//    }
    
    public static function getAllUsers($paginate = null, $orderBy = 'id', $method = 'ASC')
    {
        if (!empty($paginate)) {
            return DB::table('users')->select('*')->orderBy($orderBy,$method)->paginate($paginate);
        } else {
            return DB::table('users')->select('*')->orderBy($orderBy,$method)->get();
        }
        
    }
    
    public static function getAllActiveUsers($paginate = null)
    {
        if (!empty($paginate)) {
            return DB::table('users')->select('*')->where('active', '=', 1)->paginate($paginate);
        } else {
            return DB::table('users')->select('*')->where('active', '=', 1)->get();
        }
        
    }
}