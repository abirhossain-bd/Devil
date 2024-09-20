<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $count = $_POST['count'];
    $shortdescription = $_POST['shortdescription'];
    $icon = $_POST['icon'];

    if($count && $shortdescription && $icon ){
        $query = "INSERT INTO facts (count,shortdescription,icon) VALUES ('$count','$shortdescription','$icon')";
        mysqli_query($dbm,$query);
        $_SESSION['insertSuccess'] = "Facts insert successfully!";
        header('location: facts.php');
        
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: facts.php');
        
    }

}


if(isset($_GET['factid'])){
    $id = $_GET['factid'];
    $del_query = "DELETE FROM facts WHERE id='$id'";
    mysqli_query($dbm,$del_query);
    $_SESSION['delSuccessful'] = "Fact deleted successfully!!";
    header('location: facts.php');
}


if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    
    $select_query = "SELECT * FROM facts WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_query);
    $fact = mysqli_fetch_assoc($connect);

    if($fact['status'] == 'deactive'){
        $update_query = "UPDATE facts SET status='active' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Facts status has updated successfully!";
        header('location:facts.php');
    }else{
        $update_query = "UPDATE facts SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Fact status has updated successfully!";
        header('location:facts.php');
    }
}




// update service start

if(isset($_POST['updates'])){

    if(isset($_GET['update_id'])){

        $count = $_POST['count'];
        $shortdescription = $_POST['shortdescription'];
        $icon = $_POST['icon'];
        if(empty($count) || empty($shortdescription) || empty($icon)){
            $_SESSION['updateerror'] = "Field is recquired!";
            header("Location: edit.php?edit_id=" . $_GET['update_id']);
            exit();

        }else if($count && $shortdescription && $icon ){
            $id = $_GET['update_id'];
            $query = "UPDATE facts SET count='$count', shortdescription='$shortdescription', icon='$icon' WHERE id='$id'";
            mysqli_query($dbm,$query);
            $_SESSION['insertSuccess'] = "Fact Updated Successfully!";
            header('location: facts.php');
        }   

                  
    }

}

// update service end






?>