<body>
   <article>
      <h1>Kanban <i class="fas fa-long-arrow-alt-right smaller"></i> Settings</h1>
   </article>

   <div style="display:flex; gap: 2rem; margin-top: 2rem">

      <article style="width:33%">
         <h3 class="article-header">Categories</h3>
         <ul>
            <?php foreach( $categories as $category): ?>
            <li><?= $category->title ?> (<?= $category->id ?>)</li>
            <?php endforeach; ?>
         </ul>

         <form method="POST" action="/category/new">
            <div class="input-group">
               <input type="text" name="category_name" />
               <button>Add category</button>
            </div>
         </form>
      </article>

      <article style="width:33%">
         <h3 class="article-header">Steps</h3>
         <ul>
            <?php foreach( $steps as $step): ?>
            <li><?= $step->title ?> (<?= $step->id ?>)</li>
            <?php endforeach; ?>
         </ul>

         <form method="POST" action="/step/new">
            <div class="input-group">
               <input type="text" name="step_name" />
               <button>Add step</button>
            </div>
         </form>
      </article>

      <article style="width:33%">
         <h3 class="article-header">Users</h3>
         <p>List of users</p>

         <form method="POST" action="/user/new">
            Add user form...
         </form>
      </article>

   </div>
</body>