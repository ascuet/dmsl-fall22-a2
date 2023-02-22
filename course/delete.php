<?php include '../connection.php' ?>
<?php
    $course_id = $_REQUEST['course-code'];
    $s = "DELETE FROM courses WHERE course_id='".$course_id."'";
    if(mysqli_query($conn, $s)){
        header('Location:all.php');
    }
?>