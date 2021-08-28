<?php

if(!AJAX_REQUEST)
{
   header('Content-type:text/plain');
   echo 'Invalid operation';
   exit;
}

require_function('db_connect');
$db = db_connect();

$projects = $db->run('select id,title from projects order by title');

header('Content-type: text/html');
?>
<ul>
   <?php foreach( $projects as $project ): ?>
      <li><?= $project->title ?></li>
   <?php endforeach; ?>
</ul>