<?php include '../connection.php' ?>
<?php 
    $s = "SELECT dept_id, name from departments";
    $result = mysqli_query($conn, $s);
    // $row = mysqli_fetch_array($result);
//     while($row = mysqli_fetch_assoc($result)){
//        echo 'Department Name: '.$row['name'];
//        echo '<br>';
//    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Create Course</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Course Code</label>
                <input type="text" name="course_code" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Course Title</label>
                <input type="text" name="course_title" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Credit</label>
                <select class="form-control" name="credit" id="">
                    <option value="">Select Credit</option>
                    <option value="1">1</option>
                    <option value="1.5">1.5</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" name="type" id="">
                    <option value="">Select Type</option>
                    <option value="Theory">Theory</option>
                    <option value="Lab">Lab</option>
                    <option value="Project">Project</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select class="form-control" name="department" id="">
                    <option value="">Select Department</option>
                    <?php 
                        while($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row['dept_id'] ?>"><?php echo $row['name'] ?></option>
                        <?php }
                    ?>
                    
                </select>
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
        $code = $_POST['course_code'];
        $title = $_POST['course_title'];
        $credit = $_POST['credit'];
        $type = $_POST['type'];
        $department = $_POST['department'];
        $str = 'INSERT INTO courses(course_id, title, credit, type, department_id) VALUES ("'.$code.'","'.$title.'","'.$credit.'","'.$type.'", '.$department.')';
        if(mysqli_query($conn, $str)){
            echo 'Successfully Inserted';
        }
    }
?>