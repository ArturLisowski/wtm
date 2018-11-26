<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
	private $id;
	private $name;
	private $surname;
	private $email;
	private $password;

	public function __construct($id) {
		$id->validate([
           'id' => 'integer',
       	]);

		$this->id = $id;
		
		$user = DB::table('users')
					->where('id', $this->id)
					->get();

		$this->name = $user->name;
		$this->surname = $user->surname;
		$this->email = $user->email;
		$this->password = $user->password;
	}

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
	    $name->validate([
           'name' => 'required|string|max:25',
       	]);

        $this->name = $name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function setSurname($surname) {
	    $surname->validate([
           'surname' => 'required|string|max:35',
       	]);

        $this->surname = $surname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
	    $email->validate([
           'email' => 'required|email|max:50',
       	]);

        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
	    $password->validate([
           'password' => 'required|max:25',
       	]);

        $this->password = $password;
    }

    public function save()
	{   
        DB::table('users')
           ->where('id', $this->id)
           ->update(['name' => $this->name])
           ->update(['surname' => $this->surname])
           ->update(['email' => $this->email])
           ->update(['password' => $this->password]);
    }
}