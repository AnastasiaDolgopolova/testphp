<?php
namespace App\Model;

use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;

class Area
{
	private $db;

    public function __construct($db)
    {
        $this->db= $db;
    }

    public function get_territory($table,$ter_type_id)
	{
		$areas = $this->db->getAreas($table, $ter_type_id);
	
		//var_dump($areas);die;
		return $areas;
	}

	public function get_cityes($table,$reg_id)
	{
		$cityes = $this->db->getCityes($table,$reg_id);
	
		//var_dump($areas);die;
		return $cityes;
	}

	public function get_countryes($table,$ter_id)
	{
		$areas = $this->db->getCountryes($table, $ter_id);
	
		//var_dump($areas);die;
		return $areas;
	}
}

