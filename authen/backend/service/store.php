<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon ){
        $query = "INSERT INTO services (title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($dbm,$query);
        $_SESSION['insertSuccess'] = "Service insert successfully!";
        header('location: services.php');
        
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }

}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $del_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($dbm,$del_query);
    $_SESSION['delSuccessful'] = "Service delete successful!!";
    header('location: services.php');
}


if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];
    
    $select_query = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_query);
    $service = mysqli_fetch_assoc($connect);

    if($service['status'] == 'deactive'){
        $update_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Service status has updated successfully!";
        header('location:services.php');
    }else{
        $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$update_query);
        $_SESSION['statusUpdate'] = "Service status has updated successfully!";
        header('location:services.php');
    }
}




// update service start

if(isset($_POST['update'])){

    if(isset($_GET['updateid'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
        
            

        }if($title && $description && $icon ){
            $id = $_GET['updateid'];
            $query = "UPDATE services SET title='$title', description='$description', icon='$icon' WHERE id='$id'";
            mysqli_query($dbm,$query);
            $_SESSION['insertSuccess'] = "Service Updated Successfully!";
            header('location: services.php');
        }else{
            $_SESSION['updateerror'] = "Fields is recquired!";
            header("Location: edit.php?editid=" . $_GET['updateid']);
            exit();
        }

                  
    

}

// update service end






?>