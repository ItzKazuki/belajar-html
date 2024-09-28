<?php

class Database
{
  private $host = DB_HOST;
  private $username = DB_USER;
  private $password = DB_PASS;
  private $db_name = DB_NAME;

  private $handler;
  private $stmt;

  public function __construct()
  {
    $url = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->handler = new PDO($url, $this->username, $this->password, $option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query)
  {
    $this->stmt = $this->handler->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if ($type == null) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    $this->stmt->execute();
  }

  public function resultSet()
  {
    $this->execute();
    $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function single()
  {
    $this->execute();
    $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
}
