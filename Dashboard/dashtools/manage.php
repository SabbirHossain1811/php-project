<?php
session_start();
// regidtor page start 
if (isset($_POST['btn'])) {



    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
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
        $_SESSION['name_error'] = 'Please Name is Required........!!';
        header('location: registor.php');
    } else if (!preg_match($name_regex, $name)) {
        $_SESSION['name_error'] = 'Name can`t accpet Number........!!';
        header('location: registor.php');
    }
    //  <!-- name require  end.......................................................................-->

    //  <!-- email require  start...........................................................................-->
    if (!$email) {
        $_SESSION['email_error'] = 'Please Email is Required.........!!';
        header('location: registor.php');
    } else if (!preg_match($email_regex, $email)) {
        $_SESSION['email_error'] = 'Email is Invalid........!!';
        header('location: registor.php');
    }
    //  <!-- email require  end--...........................................................................>


    // password require start,............................................................................!!!
    if (!$password) {
        $_SESSION['pass-error'] = 'Please passWord is Required.........!!';
        header('location: registor.php');
    } else if (!preg_match($password_regex_upper,$password)) {
        $_SESSION['pass-error'] = 'PassWord required at least one upper case........!!';
        header('location: registor.php');                               
    }
     else if (!preg_match( $password_regex_lower,$password)) {
        $_SESSION['pass-error'] = 'PassWord required at least one lower case........!!';
        header('location: registor.php');                               
    }

     else if (!preg_match( $password_regex_number,$password)) {
        $_SESSION['pass-error'] = 'PassWord required at least one number........!!';
        header('location: registor.php');                               
    }
    else if (!preg_match( $password_regex_char,$password)) {
        $_SESSION['pass-error'] = 'PassWord required at least one special character.......!!';
        header('location: registor.php');                               
    }
     else if (!preg_match($password_regex_length,$password)) {
        $_SESSION['pass-error'] = 'PassWord required at last minimum eight in lenth.......!!';
        header('location: registor.php');                               
    }
    // password require end,.....................................................................................!!!!

    // Cpassword require start,...................................................................................!!!
    if (!$cpassword) {
        $_SESSION['Cpass-error'] = 'Please passWord is Required.........!!';
        header('location: registor.php');
    } else if ($cpassword != $password) {
        $_SESSION['Cpass-error'] = 'PassWord && Comfirmation password dosen`t match........!!';
        header('location: registor.php');                              
    // Cpassword require end,.......................................................................................!!!!
// registor page end 
    }
}
?>