<?php

if (!AJAX_REQUEST) {
   header('content-type: text/plain');
   echo 'Error not made with ajax request'."\n";
   print_r($_REQUEST);
   exit;
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