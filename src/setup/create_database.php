<?php

/**
 * This file creates the basic database schemafor the Kanban board
 */

require dirname(__DIR__) . '/Kanban/Database.php';
use Kanban\Database;

// Note: Using credentials like this is not secure!
$db = new Database('mysql','root','password');

echo "Creating database\n";

// if --drop given on command line, drop database first
// to allow us to start from scratch
if( $argv[1] ?? '' === '--drop' )
{
   $db->query('drop database if exists kanban');
}

$db->query('create database if not exists kanban');
$db->query('use kanban');

echo "Creating user tables\n";
$query = <<<EOL

create table if not exists users (
   id int not null auto_increment, 
   name varchar(50) not null, 
   shortname varchar(20) null,
   primary key (id)
)

EOL;
$db->query($query);

echo "Creating other data tables\n";

echo "> Creating table cards\n";
$query = <<<EOL

create table if not exists cards (
   id int not null auto_increment,
   title varchar(255) not null,
   content text default null,
   step_id int,
   category_id int,
   primary key (id)
)

EOL;
$db->query($query);

echo "> Creating table steps\n";
$query = <<<EOL

create table if not exists steps (
   id int not null auto_increment,
   title varchar(255),
   description varchar(255),
   primary key(id)
)

EOL;
$db->query($query);

echo "> Creating table step_history\n";
$query = <<<EOL

create table if not exists step_history (
   step_id int not null,
   card_id int not null,
   date_created datetime not null default NOW(),
   key(step_id)
)

EOL;
$db->query($query);
echo "> Creating table projects\n";
$query = <<<EOL

create table if not exists projects (
   id int not null auto_increment,
   title varchar(50),
   icon varchar(20),
   primary key(id)
)

EOL;
$db->query($query);

echo "> Creating table project_history\n";
$query = <<<EOL

create table if not exists project_history (
   project_id int not null,
   card_id int not null,
   date_created datetime not null default NOW(),
   key(project_id)
)

EOL;
$db->query($query);