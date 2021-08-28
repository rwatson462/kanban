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

$projects = $db->run('select id,title from projects order by title');

header('Content-type: text/html');
template('projects/snippets/list', [
   'projects' => $projects
]);