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

if (isset($_POST['emailbtnn'])) {

   //email start here.........//
   
   $email = $_POST['email'];
   
   
   
   if($email){
      $id = $_SESSION['author_id'] ;
      $query = "UPDATE users SET email='$email' WHERE id='$id'";
      mysqli_query($db,$query);
      $_SESSION['update-success'] = " Email Update Successfull...!! ";
      $_SESSION['author_email'] = $email ;
      header('location: settings.php');
   }else{
      $_SESSION['email_error']= "Enter Your email....!!";
      header('location: settings.php');
   }
   }
   // email start here.........//
  




   if(isset($_POST['passubtn'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cpass = $_POST['cpass'];


    if($oldpass && $newpass && $cpass){
        $encypt = md5($oldpass);
        $id = $_SESSION['author_id'];

        $match_query = "SELECT COUNT(*) AS 'match' FROM users WHERE id='$id' AND password='$encypt'";
        $connect = mysqli_query($db,$match_query);

        $match = mysqli_fetch_assoc($connect)['match'];

        if($match == 1){
            if($newpass == $cpass){
                $new_encrypt = md5($newpass);
                $query = "UPDATE users SET password='$new_encrypt' WHERE id='$id'";
                mysqli_query($db,$query);
                $_SESSION['pass_update'] = 'password update successfull';
                header('location: settings.php');

            }else{
                $_SESSION['pass_error'] = ' Confrim PassWord Don`t Match....!!';
                header('location: settings.php');
            }
        }else{
            $_SESSION['pass_error'] = 'PassWord  Don`t Match....!!';
            header('location: settings.php');
        }
    }else{
        $_SESSION['pass_error'] = 'Enter Your Email...!!';
        header('location: settings.php');
    }
}

   // password start here...............


   // Imagee start here...............
if (isset($_POST['imgbtn'])){
    $image =$_FILES['image']['name']; 
    $tmp_path =$_FILES['image']['tmp_name'];  
    


if($image){
 $id = $_SESSION['author_id'];
 $name = $_SESSION['author_name'];
 $explode = explode('.',$image);
 $extention = end($explode);
 $new_name = $id . "-" . $name . "-" . date("d-m-Y") . '.' . $extention;
 $local_path = "../../public/update/profile/".$new_name;
 

 if(move_uploaded_file($tmp_path,$local_path)){
         $query = "UPDATE users SET image='$new_name' WHERE id='$id'";
         mysqli_query($db,$query);
         header('location: settings.php');
 }else{
     echo"kharp";
 }

}}
  // Imagee start here...............
?>