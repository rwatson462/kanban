<body>
   <article>
      <h1>Kanban</h1>
      <form id="k_project" style="display:flex; align-items:center">
         <label for="k_select_board">Project: </label>
         <select id="k_select_board" style="margin-left:1rem">
            <?php foreach($projects as $project): ?>
               <option value="<?= $project->id ?>"><?= $project->title; ?></option>
            <?php endforeach; ?>
         </select>
      </form>
   </article>

   <section id="k_board_container"></section>
   <script type="text/javascript" src="js/board.js"></script>
</body>

