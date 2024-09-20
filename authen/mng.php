<?php

session_start();

include "./config/database.php";

if(isset($_POST['subBtn'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $name_reg = '/^(?! $)[a-zA-Z ]*$/';
    $email_reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_reg_upper = '/^(?=.*?[A-Z])/';
    $password_reg_lower = '/^(?=.*?[a-z])/';
    $password_reg_digit = '/^(?=.*?[0-9])/';
    $password_reg_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_reg_length = '/^.{8,16}/';
    $flag = false;


    $query_check_email = "SELECT COUNT(*) AS 'count' FROM users WHERE email='$email'";
    $result_check_email = mysqli_query($dbm, $query_check_email);
    $row_check_email = mysqli_fetch_assoc($result_check_email);

    if($row_check_email['count'] > 0) {
        $flag = true;
        $_SESSION['email_error'] = "This email has already exists!";
        header('location: sign.php');
    }


    if(!$name){
        $flag = true;
        $_SESSION['name_error'] = "Name field is recquired!";
        header('location: sign.php');
    }else if(!preg_match($name_reg,$name)){
        $flag = true;
        $_SESSION['name_error'] = "Name field can't accept any numaric character!";
        header('location: sign.php');
    }else{
        $_SESSION['old_name'] = $name;
        header('location: sign.php');
    }




    if(!$email){
        $flag = true;
        $_SESSION['email_error'] = "email field is recquired!";
        header('location: sign.php');
    }else if(!preg_match($email_reg,$email)){
        $flag = true;
        $_SESSION['email_error'] = "Please enter a valid Email!";
        header('location: sign.php');

        

    }else{
        $_SESSION['old_email'] = $email;
        header('location: sign.php');
    }





    if(!$password){
        $flag = true;
        $_SESSION['password_error'] = "Password field is recquired!";
        header('location: sign.php');
    }else if(!preg_match($password_reg_upper,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one upper case!";
        header('location: sign.php');
    }else if(!preg_match($password_reg_lower,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one lower case!";
        header('location: sign.php');
    }else if(!preg_match($password_reg_digit,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one digit!";
        header('location: sign.php');
    }else if(!preg_match($password_reg_char,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one speacial character!";
        header('location: sign.php');
    }else if(!preg_match($password_reg_length,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter minimum eight characters!";
        header('location: sign.php');
    }else{
        $_SESSION['old_password'] = $password;
        header('location: sign.php');
    }



    if(!$c_password){
        $flag = true;
        $_SESSION['cpassword_error'] = " Confirm password field is recquired!";
        header('location: sign.php');
    }else if($c_password != $password){
        $flag = true;
        $_SESSION['cpassword_error'] = "Credential dose't match!";
        header('location: sign.php');
    }else{
        $_SESSION['old_cpassword'] = $c_password;
        header('location: sign.php');
    }



    if($flag){
        header('location: sign.php');
    }else{
        
        $enc = sha1($password);
        $query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$enc')";
        mysqli_query($dbm,$query);
        $_SESSION['reg_com'] = "Register Successful.";
        $_SESSION['reg_name'] = $name;

        $_SESSION['reg_email'] = $email;
        header('location: signin.php');
    }

}


// sign up end





// login start

if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $email_reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $password_reg_upper = '/^(?=.*?[A-Z])/';
    $password_reg_lower = '/^(?=.*?[a-z])/';
    $password_reg_digit = '/^(?=.*?[0-9])/';
    $password_reg_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_reg_length = '/^.{8,16}/';

    $flag= false;


    if(!$email){
        $flag = true;
        $_SESSION['email_error'] = "Email field is recquired!";
        header('location: signin.php');

    }else if(!preg_match($email_reg,$email)){
        $flag = true;
        $_SESSION['email_error'] = "Please enter a valid email!";
        header('location: signin.php');

    }



    if(!$password){
        $flag = true;
        $_SESSION['password_error'] = "Password field is recquired!";
        header('location: signin.php');
    }else if(!preg_match($password_reg_upper,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one upper case!";
        header('location: signin.php');
    }else if(!preg_match($password_reg_lower,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one lower case!";
        header('location: signin.php');
    }else if(!preg_match($password_reg_digit,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one digit!";
        header('location: signin.php');
    }else if(!preg_match($password_reg_char,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter at least one speacial character!";
        header('location: signin.php');
    }else if(!preg_match($password_reg_length,$password)){
        $flag = true;
        $_SESSION['password_error'] = "Please enter minimum eight characters!";
        header('location: signin.php');
    }



    // login process start

    if(!$flag){
        $encript = sha1($password);
        $query = "SELECT COUNT(*) AS 'valid' FROM users WHERE email='$email' AND password='$encript' ";
        $connect = mysqli_query($dbm,$query);
        $result = mysqli_fetch_assoc($connect);

        
        
        if($result['valid'] ==1){
            $query = "SELECT * FROM users WHERE email='$email' AND password='$encript' ";
            $connect = mysqli_query($dbm,$query);
            $author = mysqli_fetch_assoc($connect);
            $_SESSION['author_name'] = $author['name'];
            $_SESSION['temp_name'] = $author['name'];
            $_SESSION['author_id'] = $author['id'];
            $_SESSION['author_email'] = $author['email'];
            header('location: ./backend/home/home.php');
        }else{
            $_SESSION['loginerror'] = "Credential dosen't match";
            header('location:signin.php');
        }
    }

}


?>