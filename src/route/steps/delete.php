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
$step_id = $_GET['id'] ?? '';

if (!$step_id) {
   http_response_code(422);
   header('Content-type:application/json');
   echo json_encode([
      'result' => 'error',
      'message' => 'No step id given'
   ]);
}


require_function('db_connect');
$db = db_connect();
$db->run('delete from steps where id = :id', [
   'id' => $step_id
]);
header('content-type: application/json');
echo json_encode([
   'result' => 'success'
]);
exit;