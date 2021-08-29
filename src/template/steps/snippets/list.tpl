<ul class="list">
   <?php foreach( $steps as $step ): ?>
      <li class="two-column">
         <?= $step->title ?>
         <div>
            <form class="display-inline" method="POST" action="/steps/edit?id=<?= $step->id ?>"
               data-use-ajax="1" data-dynamic-element="step-list">
               <?php /* todo add some of token here to prevent editing of the step id being passed in */ ?>
               <button class="text" name="action" value="edit" title="Edit step"><i class="fas fa-edit"></i></button>
            </form>

            <form class="display-inline"  method="POST" action="/steps/delete?id=<?= $step->id ?>"
               data-use-ajax="1" data-dynamic-element="step-list">
               <?php /* todo add some of token here to prevent editing of the step id being passed in */ ?>
               <button class="text" name="action" value="delete" title="Delete step"><i class="fas fa-trash"></i></button>
            </form>
         </div>
      </li>
   <?php endforeach; ?>
</ul>