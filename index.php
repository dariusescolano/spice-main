<?php
session_start();

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();
    // Redirect to the login page or any other appropriate page
    header("Location: login.php");
    exit();
}

include("header.php");
include("navbar.php");
?>

<div class="background-image">
    <div class="container-fluid">
        <!-- Content goes here -->
    </div>
</div>

<?php
include("footer.php");
?>


