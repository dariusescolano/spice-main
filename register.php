<?php 
session_start();
include("header.php");
include("navbar.php");
?>
<!-- Include Font Awesome library for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="background-image" id="">
    <div class="container mt-3">
        <div class="row">
            <div class="col"><!-- 1st Column Registration form -->
                <?php
                if (isset($_SESSION['status'])) {
                    $status_type = isset($_SESSION['status_type']) ? $_SESSION['status_type'] : 'warning';
                ?>
                <div class="alert alert-<?= $status_type ?> alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong><?= ucfirst($status_type) ?>!</strong> <?= $_SESSION['status'] ?>
                </div>
                <?php 
                    unset($_SESSION['status']);
                    unset($_SESSION['status_type']);
                }
                ?>
                <div class="card">
                    <div class="card-header"><h4>Registration</h4></div>
                    <div class="card-body">
                        <form action="reg_code.php" method="POST">
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
                                <label for="fname">First Name</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="mname" placeholder="Middle Name" name="mname">
                                <label for="mname">Middle Name</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="sname" placeholder="Surname" name="sname">
                                <label for="sname">Surname</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mt-3 mb-3 position-relative">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                                <label for="pwd">Password</label>
                                <div class="input-group-append position-absolute bottom-0 end-0">
                                    <!-- Replace button with icon -->
                                    <button class="btn btn-dark" type="button" id="show-password"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            <div class="form-floating mt-3 mb-3 position-relative">
                                <input type="password" class="form-control" id="pwd2" placeholder="Enter password" name="cpswd">
                                <label for="pwd2">Confirm Password</label>
                                <div class="input-group-append position-absolute bottom-0 end-0">
                                    <!-- Replace button with icon -->
                                    <button class="btn btn-dark" type="button" id="show-cpassword"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                            <button type="submit" name="register" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"><!-- 2nd Column Image Info -->
                <!-- Add your image or additional content here -->
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('show-password').addEventListener('click', function() {
        var pwdInput = document.getElementById('pwd');

        if (pwdInput.type === 'password') {
            pwdInput.type = 'text';
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            pwdInput.type = 'password';
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });

    document.getElementById('show-cpassword').addEventListener('click', function() {
        var cpwdInput = document.getElementById('pwd2');

        if (cpwdInput.type === 'password') {
            cpwdInput.type = 'text';
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            cpwdInput.type = 'password';
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });
</script>

<?php 
include("footer.php");
?>
