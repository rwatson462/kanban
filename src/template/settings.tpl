<body>
   <article>
      <h1>Kanban <i class="fas fa-long-arrow-alt-right smaller"></i> Settings</h1>
   </article>

   <div style="display:flex; gap: 2rem; margin-top: 2rem">

      <article style="width:33%">
         <h3 class="article-header">Projects</h3>
         <section data-source="/projects/load" id="project-list">
            <i class="fa fa-fw fa-spinner fa-pulse"></i> Loading...
         </section>

         <form method="POST" action="/projects/new" data-use-ajax="1" data-dynamic-element="project-list">
            <div class="input-group">
               <input type="text" name="project_name" placeholder="New Project" />
               <button type="submit"><i class="fas fa-save"></i></button>
            </div>
         </form>
      </article>

      <article style="width:33%">
         <h3 class="article-header">Steps</h3>
         <section data-source="/steps/load" id="step-list">
            <i class="fa fa-fw fa-spinner fa-pulse"></i> Loading...
         </section>

         <form method="POST" action="/steps/new" data-use-ajax="1" data-dynamic-element="step-list">
            <div class="input-group">
               <input type="text" name="step_name" placeholder="New step" />
               <button type="submit"><i class="fas fa-save"></i></button>
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