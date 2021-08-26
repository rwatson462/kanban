<?php

/**
 * Basic file to test the database class
 */

require dirname(__DIR__) .'/Kanban/Database.php';
use Kanban\Database;

$db = new Database('mysql', 'root', 'password');

print_r($db->run('SHOW DATABASES')->fetchAll());
