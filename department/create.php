<?php include '../isLoggedIn.php' ?>
<?php include '../connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Create Department</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Short Name</label>
                <input type="text" name="short_name" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Established At</label>
                <input type="date" name="established_at" class="form-control" id="">
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $dept_name = $_POST['name'];
        $dept_short_name = $_POST['short_name'];
        $dept_est_at = $_POST['established_at'];
        // echo 'Department Name is: '.$dept_name;
        // echo '<br>';
        // echo 'Department code is: '.$dept_short_name;
        $str = 'INSERT INTO departments(name, short_name, established_at) VALUES ("'.$dept_name.'","'.$dept_short_name.'","'.$dept_est_at.'")';
        if(mysqli_query($conn, $str)){
            echo 'Successfully Inserted';
        }
    }
?>