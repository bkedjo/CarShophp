<form method="post" class="container">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="mot_de_passe">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check_me_out">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>

   <?php
   if(isset($emPass)){
    ?>
     <div class="alert alert-danger" role="alert">
            <?= $emPass; ?>
    </div>

<?php
   }
   ?>
    <input type="submit" name="submit" value="Login" class="btn btn-primary">
</form>