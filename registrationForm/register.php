<?php
session_start();
?>
<?php include 'inc/header.php'?>
<?php include 'inc/nav.php'?>
<h1>Register Page </h1>

<?php include 'inc/footer.php'?>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-center">
          <h3>Register</h3>

          <!-- show msg errors in the view  -->

          <!-- <?php var_dump($_SESSION)?> -->


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

        </div>
        <div class="card-body">


          <!-- Form starts here -->
          <form action="./handelers/handelRegister.php" method="POST">
            <!-- Name -->
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" >
            </div>

            <!-- Email -->
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email"  >
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" >
            </div>

            <!-- Submit button -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
          <!-- Form ends here -->
        </div>
      </div>
    </div>
  </div>
  </div>