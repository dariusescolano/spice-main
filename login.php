<?php
session_start(); // Start the session to store user data
?>

<?php include("header.php"); ?>
<?php include("navbar.php"); ?>

<div class="background-image" id="">
    <div class="container mt-3">
        <div class="row">
            <div class="col"><!-- 1st Column Registration form -->
                <div class="card">
                    <div class="card-header"><h4>Login</h4></div>
                    <div class="card-body">
                        <?php
                        // Check if there's any session status message set
                        if(isset($_SESSION['status2'])) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['status2']; ?>
                        </div>
                        <?php
                        // Unset the session status message to avoid displaying it again
                        unset($_SESSION['status2']);
                        }
                        ?>
                        <form action="login_code.php" method="POST">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mt-3 mb-3">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                                <label for="pwd">Password</label>
                            </div>
                            <div class="mb-3">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div>
                            <button type="submit" name="login_now" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col"><!-- 2st Column Image Info -->
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
