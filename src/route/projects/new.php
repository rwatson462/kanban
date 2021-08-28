<?php

// this route is only usable on the POST method
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}

$project_name = $_POST['project_name'] ?? '';

if(!$project_name) {
   header('Content-type: text/plain');
   echo "No project name given";
   exit;
}


require_function('db_connect');
$db = db_connect();

$db->run('insert into projects set title = :title', [
   'title' => $project_name
]);

if(!AJAX_REQUEST) {
   header('Location: /settings');
   exit;
}

header('Content-type: application/json');
echo json_encode([
   'result' => 'success',
   'type' => 'project'
]);
