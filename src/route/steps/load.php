<?php

if(!AJAX_REQUEST)
{
   header('Content-type:text/plain');
   echo 'Invalid operation';
   exit;
}

require_function('db_connect');
require_function('template');

$db = db_connect();

$steps = $db->run('select id,title from steps order by title');

header('Content-type: text/html');
template('steps/snippets/list', [
   'steps' => $steps
]);