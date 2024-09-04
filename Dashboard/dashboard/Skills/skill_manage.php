<?php
session_start();
include '../../config/database.php';

if (isset($_POST['skillbtn'])) {
    $year = $_POST['year'];
    $description = $_POST['description'];


    if ($year && $description) {
        $insert_query = "INSERT INTO education (year, description) VALUES ('$year', '$description')";
        mysqli_query($db,$insert_query);
        header('location: skill.php');
    }
}


// deactive and active start here........
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $active_query = "SELECT * FROM education WHERE id='$id'";
    $connect = mysqli_query($db,$active_query);
    $educatio = mysqli_fetch_assoc($connect);

    if($educatio['status'] == 'deactive'){
        $update_query = "UPDATE education SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location:skill.php');
       }else{
        $update_query = "UPDATE education SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location: skill.php');
       }
      }

// deactive and active start here........


// delete start here .............
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM education WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['edu_delete'] = "education information Delete Successfully Complete"; 
    header('location: skill.php');
}
// delete start here .............


// education edit here....
if(isset($_POST['update'])){
    if(isset($_GET['updateid'])){
        $id = $_GET['updateid'];

        $year = $_POST['year'];
        $description = $_POST['description'];
    
        if($year && $description){
            $query_update = "UPDATE education SET year='$year',description='$description' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['edu_edit'] = "Education Informations Update Successfully Complete"; 
            header('location: skill.php');
        }
    }
}
// education edit here....
?>