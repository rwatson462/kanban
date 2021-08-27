<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Source Pot Kanban board<?= $page_title ?? '' ? " :: " . $page_title : '' ?></title>
      
      <link rel="stylesheet" type="text/css" href="/css/kanban.css" />
      <?php foreach($styles ?? [] as $style): ?>
         <link rel="stylesheet" type="text/css" href="/css/<?= $style ?>" />
      <?php endforeach; ?>

      <script src="https://kit.fontawesome.com/829c3213aa.js" crossorigin="anonymous"></script>
   </head>
