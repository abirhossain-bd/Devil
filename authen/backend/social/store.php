<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $link = $_POST['link'];
    $icon = $_POST['icon'];

    if($link && $icon ){
        $query = "INSERT INTO socials (link,icon) VALUES ('$link','$icon')";
        mysqli_query($dbm,$query);
        $_SESSION['insertSuccess'] = "Social Media insert successfully!";
        header('location: socials.php');
        
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }

}


if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    $del_query = "DELETE FROM socials WHERE id='$id'";
    mysqli_query($dbm,$del_query);
    $_SESSION['delSuccessful'] = "Social Media deleted successful!!";
    header('location: socials.php');
}


if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    
    $select_query = "SELECT * FROM socials WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_query);
    $social = mysqli_fetch_assoc($connect);

    if($social['status'] == 'deactive'){
        $update_query = "UPDATE socials SET status='active' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Social status has activated successfully!";
        header('location:socials.php');
    }else{
        $update_query = "UPDATE socials SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Social status has deactivated successfully!";
        header('location:socials.php');
    }
}




// update service start

if(isset($_POST['update'])){

    if(isset($_GET['updateid'])){

        $link = $_POST['link'];
        $icon = $_POST['icon'];
        
            

        }if($link && $icon ){
            $id = $_GET['updateid'];
            $query = "UPDATE socials SET link='$link', icon='$icon' WHERE id='$id'";
            mysqli_query($dbm,$query);
            $_SESSION['insertSuccess'] = "Social Media Updated Successfully!";
            header('location: socials.php');
        }else{
            $_SESSION['updateerror'] = "Fields is recquired!";
            header("Location: edit.php?editid=" . $_GET['updateid']);
            exit();
        }

                  
    

}

// update service end






?>