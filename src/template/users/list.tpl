<article>

   <p><a href="users.php?new">New user</a></p>

   <table>
      <thead>
         <tr>
            <th>#</th>
            <th>User name</th>
            <th> </th>
         </tr>
      </thead>
      <tbody>
         <?php foreach( $all_users as $user): ?>
            <tr>
               <td><?= $user['id'] ?></td>
               <td><?= $user['name'] ?></td>
               <td>
                  <a href="/users.php?edit&user_id=<?= $user['id'] ?>">Edit</a>
                  |
                  <a href="/users.php?delete&user_id=<?= $user['id'] ?>">Delete</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</article>