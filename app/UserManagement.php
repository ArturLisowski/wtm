<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserManagement extends model
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $active;
    private $isAdmin;
    
    /**
     * UserManagement constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        
        if (isset($id) && $id >= 0) {
            $user = DB::table('users')
                ->where('id', $this->id)
                ->get();
            
            $this->name = $user[0]->name;
            $this->email = $user[0]->email;
            $this->password = $user[0]->password;
            $this->active = $user[0]->active;
            $this->isAdmin = $user[0]->isAdmin;
        } else {
            $this->name = '';
            $this->email = '';
            $this->password = '';
            $this->active = 0;
            $this->isAdmin = 0;
        }
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
     * @param bool $value
     */
    public function setActive(bool $value)
    {
        $this->active = $value;
    }
    
    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }
    
    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = bcrypt($password);
    }
    
    /**
     * @param bool $value
     */
    public function setAdmin(bool $value)
    {
        $this->isAdmin = $value;
    }
    
    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->isAdmin;
    }
    
    /**
     * @param array $options
     * @return bool|void
     */
    public function save(array $options = [])
    {
        DB::table('users')
            ->where('id', $this->id)
            ->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'active' => $this->active,
                'isAdmin' => $this->isAdmin
            ]);
    }
    
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
