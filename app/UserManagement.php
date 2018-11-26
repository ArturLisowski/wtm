<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
	private $name;
	private $surname;
	private $email;
	private $password;

	public function __construct($id) {
		$id->validate([
           'id' => 'integer',
       	]);

		$this->id = $id;
	}

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
	    $name->validate([
           'name' => 'required|max:25',
       	]);

        $this->name = $name;
    }

    public function save(array $data = array())
	{   
        parent::save($data);
    }
}