<?php
session_start();
include "../config/database.php";
// regidtor page start 
if (isset($_POST['btn'])) {



    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $flag = false;

    
    // Regex Start Here................................................................!!!!!!!
    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower = '/^(?=.*?[a-z])/';
    $password_regex_number = '/^(?=.*?[0-9])/';
    $password_regex_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,}/';
    // $password_regex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}/';

    // Regex Start Here......................................................................!!!!!!!!!



    //  <!-- name require  start...................................................................-->
    if (!$name) {
        $flag = true;
        $_SESSION['name_error'] = 'Please Name is Required........!!';
        header('location: registor.php');
    } else if (!preg_match($name_regex, $name)) {
        $flag = true;
        $_SESSION['name_error'] = 'Name can`t accpet Number........!!';
        header('location: registor.php');
    }
    //  <!-- name require  end.......................................................................-->

    //  <!-- email require  start...........................................................................-->
    if (!$email) {
        $flag = true;
        $_SESSION['email_error'] = 'Please Email is Required.........!!';
        header('location: registor.php');
    } else if (!preg_match($email_regex, $email)) {
        $flag = true;
        $_SESSION['email_error'] = 'Email is Invalid........!!';
        header('location: registor.php');
    }
    //  <!-- email require  end--...........................................................................>


    // password require start,............................................................................!!!
    if (!$password) {
        $flag = true;
        $_SESSION['pass-error'] = 'Please passWord is Required.........!!';
        header('location: registor.php');
    } else if (!preg_match($password_regex_upper,$password)) {
        $flag = true;
        $_SESSION['pass-error'] = 'PassWord required at least one upper case........!!';
        header('location: registor.php');                               
    }
     else if (!preg_match( $password_regex_lower,$password)) {
        $flag = true;
        $_SESSION['pass-error'] = 'PassWord required at least one lower case........!!';
        header('location: registor.php');                               
    }

     else if (!preg_match( $password_regex_number,$password)) {
        $flag = true;
        $_SESSION['pass-error'] = 'PassWord required at least one number........!!';
        header('location: registor.php');                               
    }
    else if (!preg_match( $password_regex_char,$password)) {
        $flag = true;
        $_SESSION['pass-error'] = 'PassWord required at least one special character.......!!';
        header('location: registor.php');                               
    }
     else if (!preg_match($password_regex_length,$password)) {
        $flag = true;
        $_SESSION['pass-error'] = 'PassWord required at last minimum eight in lenth.......!!';
        header('location: registor.php');                               
    }
    // password require end,.....................................................................................!!!!

    // Cpassword require start,...................................................................................!!!
    if (!$cpassword) {
        $flag = true;
        $_SESSION['Cpass-error'] = 'Please passWord is Required.........!!';
        header('location: registor.php');
    } else if ($cpassword != $password) {
        $flag = true;
        $_SESSION['Cpass-error'] = 'PassWord && Comfirmation password dosen`t match........!!';
        header('location: registor.php');
        
        

// registor page end 
    }
        //database connect.........
        if($flag == false){
            $encrypt = md5($password);
            $create_query = "INSERT INTO users (name,email,password) VALUES ('$name' , '$email', '$encrypt')";
             mysqli_query($db, $create_query );
             $_SESSION['register_complete'] = "Registration Complete!";
             $_SESSION['register_name'] = "$name";
             $_SESSION['register_email'] = "$email";
             header("location: login.php");
        }
    //database connect........
}


// login page start here...........
if(isset($_POST['loginbtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $flag = false;

    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex_upper = '/^(?=.*?[A-Z])/';
    $password_regex_lower = '/^(?=.*?[a-z])/';
    $password_regex_number = '/^(?=.*?[0-9])/';
    $password_regex_char = '/^(?=.*?[#?!@$%^&*-])/';
    $password_regex_length = '/^.{8,}/';
    $password_regex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}/';

    if(!$email){
        $flag = true;
       $_SESSION['email_error'] = "email field is required!!";
       header("location: login.php");
   }else if(!preg_match($email_regex,$email)){
        $flag = true;
       $_SESSION['email_error'] = "email is in-valid!!";
       header("location: login.php");
   }

   if(!$password){
        $flag = true;
       $_SESSION['password_error'] = "password field is required!!";
       header("location: login.php");
   }else if(!preg_match($password_regex_upper,$password)){
        $flag = true;
       $_SESSION['password_error'] = "password required at least one upper case!!";
       header("location: login.php");
   }else if(!preg_match($password_regex_lower,$password)){
        $flag = true;
       $_SESSION['password_error'] = "password required at least one lower case!!";
       header("location: login.php");
   }else if(!preg_match($password_regex_number,$password)){
        $flag = true;
       $_SESSION['password_error'] = "password required at least one numerical character!!";
       header("location: login.php");
   }else if(!preg_match($password_regex_char,$password)){
        $flag = true;
       $_SESSION['password_error'] = "password required at least one special character!!";
       header("location: login.php");
   }else if(!preg_match($password_regex_length,$password)){
        $flag = true;
       $_SESSION['password_error'] = "password required at least minimum eight in length!!";
       header("location: login.php");
   }



   if(!$flag){
    $encrypt = md5($password);
    $query = "SELECT COUNT(*) AS 'validate' FROM users WHERE email='$email' AND password='$encrypt'";
    $connect = mysqli_query($db,$query);

    $result = mysqli_fetch_assoc($connect);

    if($result['validate'] == 1){
        
        $query = "SELECT * FROM users WHERE email='$email'";
        $connect = mysqli_query($db,$query);
        $author = mysqli_fetch_assoc($connect);

        $_SESSION['author_id'] = $author['id'];
        $_SESSION['author_name'] = $author['name'];
        $_SESSION['temp_name'] = $author['name'];
        $_SESSION['author_email'] = $author['email'];
        $_SESSION['author_password'] = $author['password'];

        header('location: ../dashboard/home/home.php');

    }else{
        $_SESSION['login_unsuccess'] = "credential doesn't match!!";
       header("location: login.php");
    }


   }


//    login database ....
// if()
// //    login database ....

 }



// login page end here...........
?>