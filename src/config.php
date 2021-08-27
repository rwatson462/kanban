<?php

include __DIR__.'/Kanban/Redis.php';
use Kanban\Redis;

const RedisHost = 'redis';

$redis = new Redis;
$redis->connect(RedisHost);


function require_function($function_name)
{
   if(!function_exists($function_name))
   {
      // attempt to include file that should contain the function we seek
      $filename = __DIR__ . "/function/$function_name.php";
      if(file_exists($filename))
      {
         include $filename;
      }

      // if the file didn't exist, or the file doesn't contain the function,
      // we'll just get the normal PHP error back
   }
}


function send_404_response( string $message )
{
   header( 'Content-type: text/plain' );
   http_response_code( 404 );
   echo( $message );
   exit;
}


function array_deep_sort( array &$array, string $prop )
{
   usort( $array, function( $a, $b ) use ($prop) {
      return $a[$prop] <=> $b[$prop];
   });
}