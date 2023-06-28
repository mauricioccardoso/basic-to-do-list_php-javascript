<?php
class DatabaseConfig
{
  private static $instance = null;
  private $connection;

  private function __construct()
  {
    $host = 'db';
    $user = 'root';
    $password = 'mypassword';
    $database = 'db-xneo';

    $this->connection = mysqli_connect($host, $user, $password, $database);
    if (!$this->connection) {
      die('Erro na conexão com o banco de dados: ' . mysqli_connect_error());
    }
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->connection;
  }
}
