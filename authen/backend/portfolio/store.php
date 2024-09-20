<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($title && $description && $subtitle && $image){
    $tmp = $_FILES['image']['tmp_name'];
    
        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode(".",$image);
        $extension = end($explode);
        
        $new_name = $id . "-" . $title . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 

        $localpath = "../../../public2/uploads/portfolio/" . $new_name;

        if(move_uploaded_file($tmp,$localpath)){
            $query = "INSERT INTO portfolios (title,subtitle,description,image) VALUES ('$title','$subtitle','$description','$new_name')";
            mysqli_query($dbm,$query);
            $_SESSION['port_service'] ="Portfolio added successfully!";

            header('location: portfolios.php');

        }
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }

}



if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];


    $port_query = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($dbm,$port_query);
    $portfolio = mysqli_fetch_assoc($connect);

    if($portfolio['image']){
        $oldname = $portfolio['image'];
        $existspath = "../../../public2/uploads/portfolio/" . $oldname;

        if(file_exists($existspath)){
            unlink($existspath);
            $del_query = "DELETE FROM portfolios WHERE id='$id'";
            mysqli_query($dbm,$del_query);
            $_SESSION['port_del'] = "Portfolio delete successful!!";
            header('location: portfolios.php');
        }
    }


    
}




// update portfolio start

if(isset($_GET['update_id'])){
    $uid = $_GET['update_id'];

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($title && $description && $subtitle ){
        if($image){

            $tmp = $_FILES['image']['tmp_name']; 
            $id = $_SESSION['author_id'];
            $authname = $_SESSION['author_name'];
            $explode = explode(".",$image);
            $extension = end($explode);
            
            $new_name = $id . "-" . $title . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 
    
            $localpath = "../../../public2/uploads/portfolio/" . $new_name;

            $select_for_del_image = "SELECT * FROM portfolios WHERE id='$uid'";
            $select_connect = mysqli_query($dbm,$select_for_del_image);
            $port = mysqli_fetch_assoc($select_connect);

            
                $oldimage = $port['image'];
                $existspath = "../../../public2/uploads/portfolio/" . $oldimage;
                if(file_exists($existspath)){
                    unlink($existspath);
                    if(move_uploaded_file($tmp,$localpath)){
                        $query = "UPDATE portfolios SET title='$title', description='$description', subtitle='$subtitle', image='$new_name' WHERE id='$uid'";
                        mysqli_query($dbm,$query);
                        $_SESSION['port_service'] ="Portfolio Updated successfully!";
            
                        header('location: portfolios.php');
                    }
    
    
    
                }
        }
    }else{
        $_SESSION['updateError'] = "Field is recquired!";
        header('location: edit.php?editid=' . $_GET['update_id']);
    }

    

}


// update portfolio end


// status part start

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $select_qurey = "SELECT * FROM portfolios WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_qurey);
    $portfolio = mysqli_fetch_assoc($connect);

    if($portfolio['status'] == 'deactive'){
        $up_query = "UPDATE portfolios SET status='active'WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['activestatus'] = "Portfoio has activated Successfully!";
        header('location: portfolios.php');
        
    }else{
        $up_query = "UPDATE portfolios SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['deactivestatus'] = "Portfoio has deactivated Successfully!";
        header('location: portfolios.php');
    }

}

// status part end
?>