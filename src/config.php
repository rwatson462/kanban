<?php

include __DIR__.'/function/db_connect.php';
include __DIR__.'/Kanban/Redis.php';
use Kanban\Redis;

const RedisHost = 'redis';

$redis = new Redis;
$redis->connect(RedisHost);


function template( string $tpl_file, array $data = [] ): void
{
   extract($data);
   include __DIR__ . '/template/' . $tpl_file;
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