<?php
session_start();

//Check if the user is authenticated
if (!isset($_SESSION['auth'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<h1>Profile Page</h1>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5 border p-2">
            <h2 class="border my-2 bg-success p-2">Name: <?php echo htmlspecialchars($_SESSION['auth'][0]); ?></h2>
            <h2 class="border my-2 bg-primary p-2">Email: <?php echo htmlspecialchars($_SESSION['auth'][1]); ?></h2>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
