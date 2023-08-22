<?php

class Database 
{
  public $connection;

  public function __construct()
  {
    $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8mb4';
    $this->connection = new PDO($dsn, DBUSER, DBPASS, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = [])
  {
    $statement = $this->connection->prepare($query);
    $statement->execute($params);
    
    return $statement;
  }
}