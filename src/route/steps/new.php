<?php

// this route is only usable on the POST method
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}

$step_name = $_POST['step_name'] ?? '';

if(!$step_name) {
   http_response_code(422);
   header('Content-type: application/json');
   echo '{"result": "error", "message":"No step name given"}';
   exit;
}


require_function('db_connect');
$db = db_connect();

$db->run('insert into steps set title = :title', [
   'title' => $step_name
]);


if(!AJAX_REQUEST) {
   header('Location: /settings');
   exit;
}

header('Content-type: application/json');
echo json_encode([
   'result' => 'success',
   'type' => 'category'
]);
