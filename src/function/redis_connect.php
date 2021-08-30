<?php
require dirname(__DIR__).'/config/redis_config.php';

function redis_connect()
{
   if(class_exists('Kanban\Redis')) {
      $redis = new Kanban\Redis;
      $redis->connect('RedisHost');
      return $redis;
   }

   include dirname(__DIR__).'/Kanban/Redis.php';
   $redis = new Kanban\Redis;
   $redis->connect(RedisHost);
   return $redis;
}
