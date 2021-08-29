<?php

if(!AJAX_REQUEST) {
   require_function('guard_xhr');
   guard_xhr();
}

require_function('db_connect');
require_function('template');

$db = db_connect();

$projects = $db->run('select id,title from projects order by title');

header('Content-type: text/html');
template('projects/snippets/list', [
   'projects' => $projects
]);