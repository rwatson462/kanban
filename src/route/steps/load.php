<?php

if(!AJAX_REQUEST)
{
   header('Content-type:text/plain');
   echo 'Invalid operation';
   exit;
}

require_function('db_connect');
$db = db_connect();

$steps = $db->run('select id,title from steps order by title');

header('Content-type: text/html');
?>
<ul>
   <?php foreach( $steps as $step ): ?>
      <li><?= $step->title ?></li>
   <?php endforeach; ?>
</ul>