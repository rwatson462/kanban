<?php

require_function(['db_connect', 'template']);

$db = db_connect();
$projects = $db->query('SELECT id,title FROM projects ORDER BY title');

template('html_head', ['page_title', 'Kanban']);
template('kanban', ['projects' => $projects]);
template('html_foot');