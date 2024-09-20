<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $brandname = $_POST['brandname'];

    $image = $_FILES['image']['name'];

    if($brandname && $image){
        $tmp = $_FILES['image']['tmp_name'];
        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode(".",$image);
        $extension = end($explode);
        
        $new_name = $id . "-" . $authname . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 

        $localpath = "../../../public2/uploads/brand/" . $new_name;

        if(move_uploaded_file($tmp,$localpath)){
            $query = "INSERT INTO brands (brandname,image) VALUES ('$brandname','$new_name')";
            mysqli_query($dbm,$query);
            $_SESSION['brand_service'] ="Brand added successfully!";

            header('location: brands.php');

        }
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }

}



if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];


    $port_query = "SELECT * FROM brands WHERE id='$id'";
    $connect = mysqli_query($dbm,$port_query);
    $brand = mysqli_fetch_assoc($connect);

    if($brand['image']){
        $oldname = $brand['image'];
        $existspath = "../../../public2/uploads/brand/" . $oldname;

        if(file_exists($existspath)){
            unlink($existspath);
            $del_query = "DELETE FROM brands WHERE id='$id'";
            mysqli_query($dbm,$del_query);
            $_SESSION['brand_del'] = "Brand deleted successfully!";
            header('location: brands.php');
        }
    }


    
}




// update brand start

if(isset($_GET['update_id'])){
    $uid = $_GET['update_id'];

    $brandname = $_POST['brandname'];
    $image = $_FILES['image']['name'];

    if($brandname){
        if($image){

            $tmp = $_FILES['image']['tmp_name']; 
            $id = $_SESSION['author_id'];
            $authname = $_SESSION['author_name'];
            $explode = explode(".",$image);
            $extension = end($explode);
            
            $new_name = $id . "-" . $authname . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 
    
            $localpath = "../../../public2/uploads/brand/" . $new_name;

            $select_for_del_image = "SELECT * FROM brands WHERE id='$uid'";
            $select_connect = mysqli_query($dbm,$select_for_del_image);
            $brand = mysqli_fetch_assoc($select_connect);

            
                $oldimage = $brand['image'];
                $existspath = "../../../public2/uploads/brand/" . $oldimage;
                if(file_exists($existspath)){
                    unlink($existspath);
                    if(move_uploaded_file($tmp,$localpath)){
                        $query = "UPDATE brands SET brandname='$brandname', image='$new_name' WHERE id='$uid'";
                        mysqli_query($dbm,$query);
                        $_SESSION['brand_service'] ="Brand Updated successfully!";
            
                        header('location: brands.php');
                    }
    
    
    
                }
        }
    }else{
        $_SESSION['updateError'] = "Field is recquired!";
        header('location: edit.php?editid=' . $_GET['update_id']);
    }

    

}


// update brnad end


// status part start

if(isset($_GET['status_id'])){
    $id = $_GET['status_id'];

    $select_qurey = "SELECT * FROM brands WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_qurey);
    $brand = mysqli_fetch_assoc($connect);

    if($brand['status'] == 'deactive'){
        $up_query = "UPDATE brands SET status='active'WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['activestatus'] = "Brand has activated Successfully!";
        header('location: brands.php');
        
    }else{
        $up_query = "UPDATE brands SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['deactivestatus'] = "Brand has deactivated Successfully!";
        header('location: brands.php');
    }

}

// status part end
?>