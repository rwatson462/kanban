<?php

/**
 * This file roughly tests the db_connect function
 */

require dirname(__DIR__).'/function/db_connect.php';

$db = db_connect();

try {
   assert( $db instanceof Kanban\Database, 'Database class not returned by db_connect function');
}
catch (AssertionError $e)
{
   echo 'Error: '.$e->getMessage()."\n";
}
