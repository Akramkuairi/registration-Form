<?php
session_start();
?>
<?php include 'inc/header.php'?>
<?php include 'inc/nav.php'?>
<h1>Login page </h1>
<?php
          if(isset($_SESSION['errors'])) :
          foreach($_SESSION['errors'] as $error): ?>
                
            <div class="alert alert-danger text-center">
              <?php  echo $error ?>
            </div>

            <?php endforeach ;
            endif;
            unset($_SESSION['errors']);
             ?>
<div class="container">
<form action="./handelers/hanelLogin.php" method="POST" class="text-center">
          <!-- Email field -->
          <div class="form-group row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
          </div>
          <!-- Password field -->
          <div class="form-group row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
          </div>
          <!-- Submit button -->
          <div class="form-group row justify-content-center">
            <div class="col-10 col-sm-8 col-md-6">
              <button type="submit" class="btn btn-primary btn-block m-3 ">Login</button>
            </div>
          </div>
        </form>
</div>

<?php include 'inc/footer.php'?>