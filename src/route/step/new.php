<?php

// this route is only usable on the POST method
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}




$step_name = $_POST['step_name'] ?? '';

if(!$step_name) {
   header('Content-type: text/plain');
   echo "No step name given";
   exit;
}


require_function('db_connect');
$db = db_connect();

$db->run('insert into steps set title = :title', [
   'title' => $step_name
]);

header('Location: /settings');