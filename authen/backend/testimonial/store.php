<?php
session_start();
include '../../config/database.php';


if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($name && $designation && $description && $image){
    $tmp = $_FILES['image']['tmp_name'];
    
        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode(".",$image);
        $extension = end($explode);
        
        $new_name = $id . "-" . $title . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 

        $localpath = "../../../public2/uploads/testimonial/" . $new_name;

        if(move_uploaded_file($tmp,$localpath)){
            $query = "INSERT INTO testimonials (name,designation,description,image) VALUES ('$name','$designation','$description','$new_name')";
            mysqli_query($dbm,$query);
            $_SESSION['test_service'] ="Testimonial added successfully!";

            header('location: testimonials.php');

        }
    }else{
        $_SESSION['insertError'] = "Field is recquired!";
        header('location: create.php');
        
    }

}



if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];


    $port_query = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($dbm,$port_query);
    $testimonial = mysqli_fetch_assoc($connect);

    if($testimonial['image']){
        $oldname = $testimonial['image'];
        $existspath = "../../../public2/uploads/testimonial/" . $oldname;

        if(file_exists($existspath)){
            unlink($existspath);
            $del_query = "DELETE FROM testimonials WHERE id='$id'";
            mysqli_query($dbm,$del_query);
            $_SESSION['test_del'] = "Testimonial delete successful!!";
            header('location: testimonials.php');
        }
    }


    
}




// update portfolio start

if(isset($_GET['update_id'])){
    $uid = $_GET['update_id'];

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if($name && $designation && $description ){
        if($image){

            $tmp = $_FILES['image']['tmp_name']; 
            $id = $_SESSION['author_id'];
            $authname = $_SESSION['author_name'];
            $explode = explode(".",$image);
            $extension = end($explode);
            
            $new_name = $id . "-" . $authname . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 
    
            $localpath = "../../../public2/uploads/testimonial/" . $new_name;

            $select_for_del_image = "SELECT * FROM testimonials WHERE id='$uid'";
            $select_connect = mysqli_query($dbm,$select_for_del_image);
            $port = mysqli_fetch_assoc($select_connect);

            
                $oldimage = $port['image'];
                $existspath = "../../../public2/uploads/testimonial/" . $oldimage;
                if(file_exists($existspath)){
                    unlink($existspath);
                    if(move_uploaded_file($tmp,$localpath)){
                        $query = "UPDATE testimonials SET name='$name', description='$description', designation='$designation', image='$new_name' WHERE id='$uid'";
                        mysqli_query($dbm,$query);
                        $_SESSION['test_service'] ="Testimonial Updated successfully!";
            
                        header('location: testimonials.php');
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

    $select_qurey = "SELECT * FROM testimonials WHERE id='$id'";
    $connect = mysqli_query($dbm,$select_qurey);
    $testimonial = mysqli_fetch_assoc($connect);

    if($testimonial['status'] == 'deactive'){
        $up_query = "UPDATE testimonials SET status='active'WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['activestatus'] = "Testimonial has activated Successfully!";
        header('location: testimonials.php');
        
    }else{
        $up_query = "UPDATE testimonials SET status='deactive' WHERE id='$id'";
        mysqli_query($dbm,$up_query);
        $_SESSION['deactivestatus'] = "Testimonial has deactivated Successfully!";
        header('location: testimonials.php');
    }

}

// status part end
?>