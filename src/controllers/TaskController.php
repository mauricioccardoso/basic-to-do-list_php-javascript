<?php
require '../database/DatabaseConfig.php';

class TaskController
{
  private $db;
  private static $instance;

  public function __construct()
  {
    $this->db = DatabaseConfig::getInstance();
  }

  public static function getInstance()
  {
    if (!isset(self::$instance)) {
      self::$instance = new TaskController();
    }

    return self::$instance;
  }

  public function index()
  {
    $query = 'SELECT * FROM tasks';
    $result = $this->runQuery($query);

    $tasks = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $task = array(
        'id' => $row['id'],
        'name' => $row['name']
      );
      $tasks[] = $task;
    }

    header('Content-Type: application/json');
    echo json_encode($tasks);
  }

  public function create()
  {
    $task = $this->escapeValue($_POST['task']);
    $query = 'INSERT INTO tasks (name) VALUES ("' . $task . '")';

    $this->runQuery($query);
  }

  public function edit()
  {
    parse_str(file_get_contents("php://input"), $_PUT);

    $taskId = $this->escapeValue($_PUT['id']);
    $taskName = $this->escapeValue($_PUT['task']);
    $query = 'UPDATE tasks SET name = "' . $taskName . '" WHERE id = ' . $taskId;

    $this->runQuery($query);
  }


  public function delete()
  {
    parse_str(file_get_contents("php://input"), $_DELETE);

    $taskId = $this->escapeValue($_DELETE['id']);
    $query = 'DELETE FROM tasks WHERE id = ' . $taskId;

    $this->runQuery($query);
  }

  private function escapeValue($value)
  {
    return mysqli_real_escape_string($this->db->getConnection(), $value);
  }

  private function runQuery($query)
  {
    return mysqli_query($this->db->getConnection(), $query);
  }
}
