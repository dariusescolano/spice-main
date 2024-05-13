<?php
session_start();
include("dbconn.php");

if (isset($_POST["login_now"])) {
    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['pswd']))) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = trim($_POST['pswd']); // No need to escape passwords for hashing/verification

        $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($conn, $login_query);

        if (mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);

            // Verify the password against the hashed password in the database
            if (password_verify($password, $row['password'])) {
                $_SESSION['authenticated'] = TRUE;
                $_SESSION['auth_user'] = [
                    'name' => $row['name'],
                    'email' => $row['email'],
                ];
                $_SESSION['status'] = "You are Logged In Successfully!";
                header('Location: sidenav.php'); // Redirect to sidenav.php
                exit(0);
            } else {
                $_SESSION['status2'] = "Invalid Email or Password";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status2'] = "Invalid Email or Password";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['status2'] = "All fields are Mandatory";
        header("Location: login.php");
        exit(0);
    }
}
?>
