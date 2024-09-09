<?php
session_start();
include '../../config/database.php';

    //   delete start here.......
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
    
        $port_query = "SELECT * FROM users WHERE id='$id'";
        $connect = mysqli_query($db,$port_query);
        $port = mysqli_fetch_assoc($connect);
    
       $delete_query = "DELETE FROM users WHERE id='$id'";
       mysqli_query($db,$delete_query);
    //    $_SESSION['update'] = "Service update Seccefully...!!";
      header('location: home.php');
        }
    //   delete start here.......

?>