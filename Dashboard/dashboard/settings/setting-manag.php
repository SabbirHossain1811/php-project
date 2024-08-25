<?php
session_start();
include'../../config/database.php';

if (isset($_POST['btnn'])) {

    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $name_regex_char = '/^(?=.*?[#?!@$%^&*-])/';
    $name = $_POST['name'];

   if(!$name){
    $_SESSION['update-name'] = "Enter Your Name....!!";
    header('location: settings.php');
   }elseif(preg_match($name_regex, $name)){
    $_SESSION['update-name'] = " Please One Later Number...!! ";
    header('location: settings.php');
   }
   elseif(preg_match($name_regex_char, $name)){
    $_SESSION['update-name'] = " Spacial Character don`t Accept...!! ";
    header('location: settings.php');
   }else{
    $id =   $_SESSION['author_id'];
    $query = "UPDATE users SET name ='$name' WHERE id='$id'";
    mysqli_query($db,$query);
    $_SESSION['update-succss'] = " Name Update Successfull...!! ";
    $_SESSION['author_name'] = $name ;
    header('location: settings.php');
   }


}

// if (isset($_POST['emailbtnn'])) {

//    //email start here.........//
//    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
//    $email = $_POST['email'];


//    if(!$email){
//     $_SESSION['email_error']= "Enter Your email....!!";
//     header('location: settings.php');
//    }elseif(preg_match($email_regex, $email)){
//     $_SESSION['email_error'] = " email is In-Valid...!! ";
//     header('location: settings.php');
//    }else{
//     $id =$_SESSION['author_id'];
//     $query = "UPDATE users SET name ='$email' WHERE id='$id'";
//     mysqli_query($db,$query);
//     $_SESSION['update-success'] = " Email Update Successfull...!! ";
//     $_SESSION['author_email'] = $email ;
//     header('location: settings.php');
//    }
//    }
   //email start here.........//
  

?>