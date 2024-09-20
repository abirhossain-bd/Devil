<?php

session_start();
include '../../config/database.php';


if(isset($_POST['nameubtn'])){
    $name = $_POST['name'];
    $name_reg = '/^(?! $)[a-zA-Z ]*$/';

    if(!$name){
        $_SESSION['nameError'] = "Name field is recquired!";
        header('location: profile.php');
    }else if(!preg_match($name_reg,$name)){
        $_SESSION['nameError'] = "$name is not a valid name!";
        header('location: profile.php');
        
    }else{
            $id = $_SESSION['author_id'];
            $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
            $_SESSION['author_name'] = $name;
            mysqli_query($dbm,$update_query);
            $_SESSION['nameupdate'] ="Name Update successful";
            header('location: ./profile.php');
        }
        
}
// name update end




// email update start



if(isset($_POST['emailubtn'])){
    $email = $_POST['email'];
    $email_reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

    if(!$email){
        $_SESSION['emailError'] = "Email field is recquired!";
        header('location: profile.php');
    }else if(!preg_match($email_reg,$email)){
        $_SESSION['emailError'] = "$email is not a valid email!";
        header('location: profile.php');
        
    }else{
            $id = $_SESSION['author_id'];
            $update_query = "UPDATE users SET email='$email' WHERE id='$id'";
            mysqli_query($dbm,$update_query);
            $_SESSION['emailupdate'] ="Email Update successful";
            header('location: ./profile.php');
        }
        
}

// email update end




// pass update start


if(isset($_POST['passubtn'])){
    $old_pass = $_POST['oldpass'];
    $new_pass = $_POST['newpass'];
    $con_pass = $_POST['conpass'];

    $password_reg_upper = '/^(?=.*?[A-Z])/';
    $password_reg_lower = '/^(?=.*?[a-z])/';
    $password_reg_digit = '/^(?=.*?[0-9])/';
    $password_reg_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_reg_length = '/^.{8,16}/';


    if(!$old_pass){
        $_SESSION['opassError'] = "Old password field is recquired!";
        header('location: profile.php');

    }else if(!$new_pass){
        $_SESSION['npassError'] = "New password field is recquired!";
        header('location: profile.php');
    }else if(!$con_pass){
        $_SESSION['cpassError'] = "Confirm password field is recquired!";
        header('location: profile.php');
    }else{
        $old_e = sha1($_POST['oldpass']);
        $id = $_SESSION['author_id'];
        $count_query = "SELECT COUNT(*) as 'result' FROM users WHERE password='$old_e' AND id='$id'";
        $connect = mysqli_query($dbm,$count_query);
        $result = mysqli_fetch_assoc($connect)['result'];

        if($result == 1){

            if(!preg_match($password_reg_upper,$new_pass)){
                $_SESSION['npassError'] = "Please enter at least one upper case!";
                header('location: profile.php');
            }else if(!preg_match($password_reg_lower,$new_pass)){
                $_SESSION['npassError'] = "Please enter at least one lower case!";
                header('location: profile.php');
            }else if(!preg_match($password_reg_digit,$new_pass)){
                $_SESSION['npassError'] = "Please enter at least one digit!";
                header('location: profile.php');
            }else if(!preg_match($password_reg_char,$new_pass)){
                $_SESSION['npassError'] = "Please enter at least one speacial character!";
                header('location: profile.php');
            }else if(!preg_match($password_reg_length,$new_pass)){
                $_SESSION['npassError'] = "Please enter minimum eight characters!";
                header('location: profile.php');
            }else if($new_pass == $con_pass){
                $new_e = sha1($_POST['newpass']);
                $update_query = "UPDATE users SET password='$new_e' WHERE id='$id' ";
                mysqli_query($dbm,$update_query);
                $_SESSION['passupdate'] = "Password Update successfull";
                header('location: profile.php');
            }else{
                $_SESSION['updatefailed'] = "Credintial doesn't match!";
                header('location: profile.php');
            }


        }else{
            $_SESSION['updatefailed'] = "Old password doesn't match!";
            header('location: profile.php');
        }


        
    }

}

// pass update end



// profile picture update start

if(isset($_POST['ppubtn'])){
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    if($image){

        $id = $_SESSION['author_id'];
        $authname = $_SESSION['author_name'];
        $explode = explode(".",$image);
        $extension = end($explode);
        
        $new_name = $id . "-" . $authname . "-" . date("d-m-Y") . "-" . rand(0,9999) . ".". $extension; 

        $localpath = "../../../public2/uploads/profile/" . $new_name;

        if(move_uploaded_file($tmp,$localpath)){
            $update_query = "UPDATE users SET image='$new_name' WHERE id='$id'";
            mysqli_query($dbm,$update_query);
            $_SESSION['imgupdate'] ="Image update Successful";
            header('location: profile.php');

        }else{
            echo "kharap";
        }
    }
    
        
}

// profile picture update end


// bio update start



if(isset($_POST['bioubtn'])){
    $bio = $_POST['bio'];

    if(!$bio){
        $_SESSION['bioError'] = "Bio field is recquired!";
        header('location: profile.php');       
    }else{
            $id = $_SESSION['author_id'];
            $update_query = "UPDATE users SET bio='$bio' WHERE id='$id'";
            mysqli_query($dbm,$update_query);
            $_SESSION['bioupdate'] ="Bio Updated successfully";
            header('location: ./profile.php');
        }
        
}


// bio update end


// about update start

if(isset($_POST['aboutubtn'])){
    $about = trim($_POST['about']);

    if(!$about){
        $_SESSION['aboutError'] = "About field is recquired!";
        header('location: profile.php');       
    }else{
            $id = $_SESSION['author_id'];
            $update_query = "UPDATE users SET about='$about' WHERE id='$id'";
            mysqli_query($dbm,$update_query);
            $_SESSION['aboutupdate'] ="About Updated successfully";
            header('location: ./profile.php');
        }
        
}



// about update end

?>