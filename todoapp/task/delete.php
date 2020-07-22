<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/crud.php';
include_once '../objects/task.php';
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);

if($_SERVER['REQUEST_METHOD']=='DELETE')
{
	parse_str(file_get_contents("php://input"),$post_vars);
	$task->id=$post_vars['del'];
	if($task->delete()){  
    echo json_encode(array("message" => "Task was deleted."));
	}
	else{
    echo json_encode(array("message" => "Unable to delete Task."));
	}
}
?>