<?php
require dirname(__DIR__).'/config/db_config.php';

function db_connect()
{
   if(class_exists('Kanban\Database')) {
      return new Kanban\Database(MySQLHost, MySQLUser, MySQLPass, MySQLDatabase);
   }
   
   include dirname(__DIR__).'/Kanban/Database.php';
   return new Kanban\Database(MySQLHost, MySQLUser, MySQLPass, MySQLDatabase);
}
