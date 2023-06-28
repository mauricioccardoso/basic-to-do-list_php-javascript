<?php
require '../src/database/DatabaseConfig.php';

class DockerTableCreator
{
  private $db;

  public function __construct()
  {
    $this->db = DatabaseConfig::getInstance();
  }

  public function createTable()
  {
    $connection = $this->db->getConnection();

    $tableName = 'tasks';

    $query = "SHOW TABLES LIKE '$tableName'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 0) {
      // Criação da tabela
      $query = 'CREATE TABLE ' . $tableName . ' (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255)
      )';

      if (mysqli_query($connection, $query)) {
        echo 'Tabela criada com sucesso!';
      } else {
        echo 'Erro ao criar tabela: ' . mysqli_error($connection);
      }
    } else {
      echo 'A tabela já existe!';
    }
  }
}

$tableCreator = new DockerTableCreator();
$tableCreator->createTable();