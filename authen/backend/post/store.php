<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $link = $_POST['link'];
    $icon = $_POST['icon'];

    if($link && $icon){
        $query = "INSERT INTO posts (link,icon) VALUES ('$link','$icon')";
        mysqli_query($dbm,$query);
        $_SESSION['updatesuccess'] ="Post added successfully!";

        header('location: posts.php');

        }
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }





    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $del_query = "DELETE FROM posts WHERE id='$id'";
        mysqli_query($dbm,$del_query);
        $_SESSION['delSuccessful'] = "Post deleted successfully!!";
        header('location: posts.php');
    }




// update portfolio start

if(isset($_POST['update'])){

    if(isset($_GET['updateid'])){

        $link = $_POST['link'];
        $icon = $_POST['icon'];
        
            

        }if($link && $icon ){
            $id = $_GET['updateid'];
            $query = "UPDATE posts SET link='$link', icon='$icon' WHERE id='$id'";
            mysqli_query($dbm,$query);
            $_SESSION['updatesuccess'] = "Post Updated Successfully!";
            header('location: posts.php');
        }else{
            $_SESSION['updateerror'] = "Fields is recquired!";
            header("Location: edit.php?editid=" . $_GET['updateid']);
            exit();
        }

                  
    

}


// update portfolio end


// status part start

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $select_qurey = "SELECT * FROM posts WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_qurey);
    $post = mysqli_fetch_assoc($connect);

    if($post['status'] == 'deactive'){
        $up_query = "UPDATE posts SET status='active'WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['activestatus'] = "Post has activated Successfully!";
        header('location: posts.php');
        
    }else{
        $up_query = "UPDATE posts SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['deactivestatus'] = "Post has deactivated Successfully!";
        header('location: posts.php');
    }

}

// status part end
?>