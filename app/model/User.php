<?php
namespace App\Model;

use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;

class User
{
	private $db;

    public function __construct($db)
    {
        $this->db= $db;
    }

    public function showProfile($table,$id)
	{
		$user = $this->db->getOne($table, $id);
		return $user;
	}

	public function getAll($table)
	{
		$users = $this->db->getAll($table);
		return $users;
	}
}

