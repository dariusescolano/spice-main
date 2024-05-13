<?php 
session_start();
include("dbconn.php");

if(isset($_POST["register"])){
    $fname = trim($_POST['fname']);
    $mname = trim($_POST['mname']);
    $sname = trim($_POST['sname']);
    $email = trim($_POST['email']);
    $password = $_POST['pswd'];
    $password2 = $_POST['cpswd'];

    $name = $fname. ', ' .$mname. ' ' . $sname;
    $status = "user";

    $verify_token = md5(rand());

    if(empty($fname) || empty($mname) || empty($sname) || empty($email) || empty($password) || empty($password2)) {
        $_SESSION['status'] = "All fields are required!";
        $_SESSION['status_type'] = "warning";
        header("Location: register.php");
        exit(0);
    } elseif($password != $password2) {
        $_SESSION['status'] = "Passwords do not match!";
        $_SESSION['status_type'] = "warning";
        header("Location: register.php");
        exit(0); 
    } else {
        $check_email_query = "SELECT email FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($check_email_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) {
            $_SESSION['status'] = "Email already exists!";
            $_SESSION['status_type'] = "warning";
            header("Location: register.php");
            exit(0);
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (name, status, email, password, verify_token) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param("sssss", $name, $status, $email, $hashed_password, $verify_token);

            if($stmt->execute()) {
                $_SESSION['status'] = "Registration successful!";
                $_SESSION['status_type'] = "success";
                header("Location: register.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Registration failed";
                $_SESSION['status_type'] = "warning";
                header("Location: register.php");
                exit(0);
            }
        }
    }
}

?>
