<?php

if(!AJAX_REQUEST) {
   require_function('guard_xhr');
   guard_xhr();
}

require_function('db_connect');
require_function('template');

$db = db_connect();

$steps = $db->run('select id,title from steps order by title');

header('Content-type: text/html');
template('steps/snippets/list', [
   'steps' => $steps
]);