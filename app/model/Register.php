<?php
namespace App\Model;

use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;

use PDO;

class Register
{
	private $db;

    public function __construct($db)
    {
        $this->db= $db;
    }
    public function checkUser ($table, $email) 
    {
      return $this->db->getByEmail($table, $email);
    }
    

    public function add($table,$data)
	{
		$this->db->create($table, [
					'name' => $_POST['name'],
					'email' => $_POST['email'],
					'territory' => $_POST['territory']	
				]);
	}

}

