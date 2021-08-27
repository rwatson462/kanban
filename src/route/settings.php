<?php

require_function('template');
require_function('db_connect');

$db = db_connect();

$steps = $db->run('select id,title from steps')->fetchAll();
$categories = $db->run('select id,title from categories')->fetchAll();

template('html_head', ['page_title', 'Settings']);
template('settings', [
   'steps' => $steps,
   'categories' => $categories
]);
template('html_foot');
