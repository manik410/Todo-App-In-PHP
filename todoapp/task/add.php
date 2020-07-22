<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/crud.php';
include_once '../objects/task.php';
  
$database = new Database();
$db = $database->getConnection();
  
$task = new Task($db);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task->name = $_POST['name'];
    $task->description = $_POST['description'];
    $task->priority=$_POST['priority'];
    if($task->create()){
        http_response_code(201);
        echo json_encode(array("message" => "Task was created."));
    }
    else{
        echo json_encode(array("message" => "Unable to create Task."));
    }
}

?>
