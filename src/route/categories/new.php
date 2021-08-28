<?php

// this route is only usable on the POST method
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
   header('Location: /404');
   exit;
}

$category_name = $_POST['category_name'] ?? '';

if(!$category_name) {
   header('Content-type: text/plain');
   echo "No category name given";
   exit;
}


require_function('db_connect');
$db = db_connect();

$db->run('insert into categories set title = :title', [
   'title' => $category_name
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
