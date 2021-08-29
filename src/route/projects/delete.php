<?php

if(!AJAX_REQUEST) {
   require_function('guard_xhr');
   guard_xhr();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}


// todo check token for validity against the incoming and existing data
$project_id = $_GET['id'] ?? '';

if (!$project_id) {
   http_response_code(422);
   header('Content-type:application/json');
   echo json_encode([
      'result' => 'error',
      'message' => 'No project id given'
   ]);
}


require_function('db_connect');
$db = db_connect();
$db->run('delete from projects where id = :id', [
   'id' => $project_id
]);
header('content-type: application/json');
echo json_encode([
   'result' => 'success'
]);
exit;