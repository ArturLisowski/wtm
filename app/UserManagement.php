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
    private $active;
    
    /**
     * UserManagement constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        
        $user = DB::table('users')
            ->where('id', $this->id)
            ->get();
        
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->active = $user->active;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * @param int $value
     */
    public function setActive(int $value)
    {
        $this->active=$value;
    }
    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
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
    
    /**
     * @param int|null $paginate
     * @param string $orderBy
     * @param string $method
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public static function getAllUsers(int $paginate = null, string $orderBy = 'id', string $method = 'ASC')
    {
        if (!empty($paginate)) {
            return DB::table('users')->select('*')->orderBy($orderBy, $method)->paginate($paginate);
        } else {
            return DB::table('users')->select('*')->orderBy($orderBy, $method)->get();
        }
    }
    
    /**
     * @param int|null $paginate
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public static function getAllActiveUsers(int $paginate = null)
    {
        if (!empty($paginate)) {
            return DB::table('users')->select('*')->where('active', '=', 1)->paginate($paginate);
        } else {
            return DB::table('users')->select('*')->where('active', '=', 1)->get();
        }
    }
}