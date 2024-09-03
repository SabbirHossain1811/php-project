<?php
include '../../config/database.php';


// image snsert here update here..

if (isset($_POST['add-btn'])) {
    $id = $_SESSION['author_id'] ;
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $tmp_name = $_FILES['image']['tmp_name'];

    if($title && $subtitle && $description && $image){
      $newname = $id. '-' . $title . '-' . date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

      $localpath = '../../public/update/portfolios/'.$newname;

      if(move_uploaded_file($tmp_name,$localpath)){
        $insert_query = "INSERT INTO portfolio (title,subtitle,description,image) VALUES ('$title','$subtitle','$description','$newname')";
        mysqli_query($db,$insert_query);


        header('location: portfolio.php');
      }
    }
}
 
//  portfolio active deactive start here 
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $getquery = "SELECT * FROM portfolio WHERE id='$id'";
    $connect = mysqli_query($db,$getquery);
    $portfoli = mysqli_fetch_assoc($connect);
 
 
    if($portfoli['status'] == 'deactive'){
     $update_query = "UPDATE portfolio SET status='active' WHERE id='$id'";
     mysqli_query($db,$update_query);
    //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
     header('location:portfolio.php');
    }else{
     $update_query = "UPDATE portfolio SET status='deactive' WHERE id='$id'";
     mysqli_query($db,$update_query);
    //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
     header('location: portfolio.php');
    }
   }
 
//  portfolio active deactive start here 


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $port_query = "SELECT * FROM portfolio WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);


   if($port['image']){
    $oldname = $port['image'];
    $existspath = '../../public/update/portfolios/'.$oldname ;


    if(file_exists($existspath )){
        unlink($existspath );
    }
   }


   $delete_query = "DELETE FROM portfolio WHERE id='$id'";
   mysqli_query($db,$delete_query);
//    $_SESSION['update'] = "Service update Seccefully...!!";
  header('location: portfolio.php');
    }
  
?>