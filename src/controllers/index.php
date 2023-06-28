<?php
require "./TaskController.php";

$taskController = TaskController::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $taskController->index();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $taskController->create();
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $taskController->edit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  $taskController->delete();
}