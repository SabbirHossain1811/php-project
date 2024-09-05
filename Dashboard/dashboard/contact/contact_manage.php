<?php
session_start();
include '../../config/database.php';

if(isset($_POST['contactbtn'])){
    $addares = $_POST['addares'];
    $number = $_POST['number'];
    if($addares && $number){
        $insert_query = "INSERT INTO contacts (addares,number) VALUES ('$addares','$number')";
        mysqli_query($db,$insert_query);


        header('location: contact.php');
      }
    }


    // deactive and active start here........
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $active_query = "SELECT * FROM contacts WHERE id='$id'";
    $connect = mysqli_query($db,$active_query);
    $contact = mysqli_fetch_assoc($connect);

    if($contact['status'] == 'deactive'){
        $update_query = "UPDATE contacts SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location: contact.php');
       }else{
        $update_query = "UPDATE contacts SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location: contact.php');
       }
      }


          //   delete start here.......
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
    
        $port_query = "SELECT * FROM contacts WHERE id='$id'";
        $connect = mysqli_query($db,$port_query);
        $port = mysqli_fetch_assoc($connect);
    
       $delete_query = "DELETE FROM contacts WHERE id='$id'";
       mysqli_query($db,$delete_query);
    //    $_SESSION['update'] = "Service update Seccefully...!!";
      header('location: contact.php');
        }
    //   delete start here.......

// edit sart heree....
    if(isset($_POST['update'])){
        if(isset($_GET['updateid'])){
          $id = $_GET['updateid'];
          $addares = $_POST['addares'];
          $number = $_POST['number'];

          if($addares && $number){
           $query_con = "UPDATE contacts SET addares='$addares', number='$number' WHERE id='$id'";
           mysqli_query($db,$query_con);
           header('location: contact.php');
          }
        }
        }
?>