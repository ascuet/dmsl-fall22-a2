<?php
// Start the session
session_start();
?>
<?php include '../connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $email_address = $_POST['email'];
        $password = $_POST['password'];
        $s = "SELECT * FROM users WHERE email='".$email_address."' AND password='".md5($password)."' ";
        $q = mysqli_query($conn, $s);
        $r = mysqli_fetch_assoc($q);
        if(mysqli_num_rows($q)){
            $_SESSION['username'] = $r['name'];
            $_SESSION['userrole'] = $r['role'];
            header('Location: ../index.php');
        }
        // echo '<pre>';
        // print_r($r);
        // echo '</pre>';
    }

?>