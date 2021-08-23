<?php

include dirname(__DIR__).'/config.php';

global $redis;


// check if we want to save a new user
if( $_SERVER['REQUEST_METHOD'] === 'POST' )
{
   $user = [
      'name' => $_POST['name'] ?? '',
   ];

   if( isset($_POST['id']) )
   {
      $user['id'] = $_POST['id'];
   }

   $user_id = $redis->createUser( $user );
   header('Location: /users.php');
   exit;
}

// Check if we want to delete a user
if( isset($_REQUEST['delete'] ) )
{
   $user_id = (int)$_REQUEST['user_id'];
   if( !$user_id )
   {
      send_404_response('User not found');
   }

   $redis->deleteUser( $user_id );
   header( 'Location: /users.php' );
   exit;
}

// Check if we want to create a new user
if( isset($_REQUEST['new']) )
{
   // Show new user form
   template('html_head.tpl', ['page_title' => 'Create new user'] );
   template('users/new.tpl');
   template('html_foot.tpl');
   exit;
}

// Check if we want to edit an existing user
if( isset($_REQUEST['edit']) )
{
   // Get user detail
   $user = $redis->getUser( (int)$_REQUEST['user_id'] );

   if( !$user )
   {
      send_404_response('User not found');
   }

   // Show edit user form
   template('html_head.tpl', ['page_title' => 'Edit user'] );
   template('users/edit.tpl', ['user' => $user] );
   template('html_foot.tpl');
   exit;
}

$all_users = $redis->getUsers();
array_deep_sort( $all_users, 'id' );

template('html_head.tpl', ['page_title' => 'Users'] );
template('users/list.tpl', ['all_users' => $all_users] );
template('html_foot.tpl');