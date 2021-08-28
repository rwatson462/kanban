<?php

if(!AJAX_REQUEST)
{
   header('Content-type:text/plain');
   echo 'Invalid operation';
   exit;
}

require_function('db_connect');
$db = db_connect();

$categories = $db->run('select id,title from categories order by title');

header('Content-type: text/html');
?>
<ul>
   <?php foreach( $categories as $cat ): ?>
      <li><?= $cat->title ?></li>
   <?php endforeach; ?>
</ul>