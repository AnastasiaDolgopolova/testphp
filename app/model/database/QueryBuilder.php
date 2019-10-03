<?php
namespace App\Model\Database;

use PDO;

class QueryBuilder {

  private $pdo;

  public function __construct(PDO $pdo){
    $this->pdo= $pdo;
  }
  function getAll($table) {
   
    $sql = "SELECT * FROM {$table}";
    $statement= $this->pdo->prepare($sql);
    $statement->execute();
    
   return $statement->fetchAll(PDO::FETCH_ASSOC); 
  }

  function getOne($table, $id)
  {
    $sql = "SELECT * FROM {$table} WHERE id=:id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->execute([
    'id' => $id
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC); 
    return $result;
  }

  function getAreas($table, $ter_type_id)
  {
    $sql = "SELECT * FROM {$table} WHERE ter_type_id=:ter_type_id";
    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':ter_type_id',$ter_type_id);
    $statement->execute([
    'ter_type_id' => $ter_type_id
    ]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
  }

   function getCityes($table,$reg_id)
  {
    $sql = "SELECT * FROM {$table} WHERE reg_id=:reg_id && ter_type_id=:ter_type_id";//{$table}
    $statement = $this->pdo->prepare($sql);
    $bindValues = ['reg_id'=> $reg_id,
    'ter_type_id' => '1'
    ];
    $statement->execute($bindValues);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
  }

  function getCountryes($table,$ter_id)
  {
    $sql = "SELECT * FROM {$table} WHERE ter_pid = :ter_id ";
    $statement = $this->pdo->prepare($sql);
    $statement->bindParam(':ter_id',$ter_id);
    $statement->execute([
    'ter_id' => $ter_id
    ]);

    $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
    return $result;
  }

  public function create($table, $data)
  {
    $keys = implode(',', array_keys($data));
    $tags = ":" . implode(', :', array_keys($data));

    $sql = "INSERT INTO {$table} ({$keys}) VALUES ({$tags})";
    $statement = $this->pdo->prepare($sql);
    $statement->execute($data);
  }
}