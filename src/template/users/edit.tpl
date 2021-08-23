<article>
   <form method="POST">
      <input type="hidden" name="id" value="<?= $user['id'] ?>" />
      <fieldset>
         <legend><label for="user_name">User name</label></legend>
         <input 
            type="text" 
            name="name" 
            id="user_name" 
            placeholder="John Doe"
            value="<?= $user['name'] ?>"
         />
      </fieldset>

      <p><button type="submit">Save changes</button></p>
   </form>
   
   <a href="/users.php">Back</a>
</article>