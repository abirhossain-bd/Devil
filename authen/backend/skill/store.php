<?php
include '../../config/database.php';
session_start();
if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $year = $_POST['year'];
    $ratio = $_POST['ratio'];

    if($title && $year && $ratio){
        $insert_query = "INSERT INTO skills (title,year,ratio) VALUES ('$title','$year','$ratio')";
        mysqli_query($dbm,$insert_query);
        $_SESSION['skillsuccess'] = "Skill insert successful";
        header('location:skills.php');
    }else{
        $_SESSION['skillfailed'] = "Field is recquired!";
        header('location:create.php');
    }

}


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $del_query = "DELETE FROM skills WHERE id='$id'";
    mysqli_query($dbm,$del_query);
    $_SESSION['del_success'] = "Skill Deleted Successfully!";
    header('location:skills.php');
}


if(isset($_POST['update'])){
    if(isset($_GET['update_id'])){

        $title = $_POST['title'];
        $year = $_POST['year'];
        $ratio = $_POST['ratio'];
    }if($title && $year && $ratio){
        $id = $_GET['update_id'];
        $update_query = "UPDATE skills SET title='$title', year='$year', ratio='$ratio' WHERE id='$id' ";
        mysqli_query($dbm,$update_query);
        $_SESSION['updateSuccess'] = "Skill updated Successfully!";
        header('location: skills.php');
    }else{
        $_SESSION['updateError'] = "Field is recquired!";
        header('location: edit.php?editid=' . $_GET['update_id']);
    }



}


if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $select_query = "SELECT * FROM skills WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_query);
    $skill = mysqli_fetch_assoc($connect);

    if($skill['status'] == 'deactive'){
        $update_query = "UPDATE skills SET status='active' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['activestatus'] = "Skill has activated successfull";
        header('location:skills.php');
    }else{
        $update_query = "UPDATE skills SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['deactivestatus'] = "Skill has deactivated successfull";
        header('location:skills.php');
    }

}
?>