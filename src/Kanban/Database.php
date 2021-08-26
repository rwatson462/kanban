<?php

namespace Kanban;

use \PDO, \PDOStatement;

class Database extends PDO
{
   public function __construct(
      string $host, string $user, string $password,
      string $db_name = '', int $port = 3306
      )
   {
      // initialise PDO parameters and connect
      $dsn = "mysql:host=$host;port=$port;charset=utf8mb4" . ($db_name ? ";dbname=$dbname" : '');

      parent::__construct($dsn, $user, $password);

      // set default fetch mode to object
      $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   }

   /**
    * Wrapper for prepare/execute
    * @param string $query The SQL query to execute
    * @param array $data A key/value pair of items
    * @return PDOStatement The resulting Statement object from PDO
    */
   public function run(string $query, array $data = []) : PDOStatement
   {
      $stmt = $this->prepare($query);
      $stmt->execute($data);
      return $stmt;
   }
}