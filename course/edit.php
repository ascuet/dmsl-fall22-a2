<?php include '../connection.php' ?>
<?php 
    $course_id = $_REQUEST['course-code'];
    $ss = "SELECT * FROM courses WHERE course_id='".$course_id."' ";
    $res = mysqli_query($conn, $ss);
    $course = mysqli_fetch_assoc($res);
?>
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
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Edit Course</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Course Code</label>
                <input type="text" name="course_code" value="<?php echo $course['course_id'] ?>" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Course Title</label>
                <input type="text" name="course_title" value="<?php echo $course['title'] ?>" class="form-control" id="">
            </div>
            <div class="form-group">
                <label for="">Credit</label>
                <select class="form-control" name="credit"  id="">
                    <option value="">Select Credit</option>
                    <option value="1" <?php if($course['credit']==1) echo 'selected';  ?>>1</option>
                    <option value="1.5" <?php if($course['credit']==1.5) echo 'selected'; ?>>1.5</option>
                    <option value="2" <?php if($course['credit']==2) echo 'selected'; ?>>2</option>
                    <option value="3" <?php if($course['credit']==3) echo 'selected'; ?>>3</option>
                    <option value="4" <?php if($course['credit']==4) echo 'selected'; ?>>4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select class="form-control" name="type" id="">
                    <option value="">Select Type</option>
                    <option value="Theory" <?php if($course['type']=='Theory') echo 'selected';  ?> >Theory</option>
                    <option value="Lab" <?php if($course['type']=='Lab') echo 'selected';  ?> >Lab</option>
                    <option value="Project" <?php if($course['type']=='Project') echo 'selected';  ?> >Project</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select class="form-control" name="department" id="">
                    <option value="">Select Department</option>
                    <?php 
                        while($row = mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row['dept_id'] ?>" <?php if($course['department_id']==$row['dept_id']) echo 'selected'; ?> ><?php echo $row['name'] ?></option>
                        <?php }
                    ?>
                    
                </select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
        $str = 'UPDATE courses SET course_id="'.$code.'", title="'.$title.'", credit="'.$credit.'", type="'.$type.'", department_id='.$department.' WHERE course_id="'. $course_id.'"';
        if(mysqli_query($conn, $str)){
            header('Location:all.php');
        }
    }
?>