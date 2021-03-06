<body>
   <article>
      <h1>Kanban <i class="fas fa-long-arrow-alt-right smaller"></i> Settings</h1>
      <p><a href="/board" class="cta">View board</a></p>
   </article>

   <div class="column-container">

      <article>
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

      <article>
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

   </div>
</body>