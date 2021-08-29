<?php

if(!AJAX_REQUEST) {
   require_function('guard_xhr');
   guard_xhr();
}

// this route is only usable on the POST method
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}

$project_name = $_POST['project_name'] ?? '';

if(!$project_name) {
   http_response_code(422);
   header('Content-type: application/json');
   echo '{"result": "error", "message":"No project name given"}';
   exit;
}


require_function('db_connect');
$db = db_connect();

$db->run('insert into projects set title = :title', [
   'title' => $project_name
]);

header('Content-type: application/json');
echo json_encode([
   'result' => 'success',
   'type' => 'project'
]);
