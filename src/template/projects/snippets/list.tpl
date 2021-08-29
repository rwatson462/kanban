<ul class="list">
   <?php foreach( $projects as $project ): ?>
      <li class="two-column">
         <?= $project->title ?>
         <div>
            <form class="display-inline" method="POST" action="/projects/edit?id=<?= $project->id ?>"
               data-use-ajax="1" data-dynamic-element="project-list">
               <?php /* todo add some of token here to prevent editing of the project id being passed in */ ?>
               <button class="text" title="Edit project"><i class="fas fa-edit"></i></button>
            </form>

            <form class="display-inline"  method="POST" action="/projects/delete?id=<?= $project->id ?>"
               data-use-ajax="1" data-dynamic-element="project-list">
               <?php /* todo add some of token here to prevent editing of the project id being passed in */ ?>
               <button class="text" title="Delete project"><i class="fas fa-trash"></i></button>
            </form>
         </div>
      </li>
   <?php endforeach; ?>
</ul>
