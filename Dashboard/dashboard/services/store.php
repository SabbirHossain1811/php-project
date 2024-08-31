<?php
  include '../../config/database.php';
  session_start();

// database data insart start here......
  if(isset($_POST['add-btn'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
     $query = "INSERT INTO services(title,description,icon) VALUES('$title','$description','$icon')";
     mysqli_query($db,$query);
     $_SESSION['create-now'] = "Service Insert Seccefully...!!";
     header('location: service.php');
    }
  }
// database data insart start here......


// active deactive start here...........
  if(isset($_GET['statusid'])){
   $id = $_GET['statusid'];

   $getquery = "SELECT * FROM services WHERE id='$id'";
   $connect = mysqli_query($db,$getquery);
   $service = mysqli_fetch_assoc($connect);


   if($service['status'] == 'Deactive'){
    $update_query = "UPDATE services SET status='active' WHERE id='$id'";
    mysqli_query($db,$update_query);
    $_SESSION['update-noww'] = "Service update Seccefully...!!";
    header('location: service.php');
   }else{
    $update_query = "UPDATE services SET status='Deactive' WHERE id='$id'";
    mysqli_query($db,$update_query);
    $_SESSION['update-noww'] = "Service update Seccefully...!!";
    header('location: service.php');
   }
  }


  // active deactive start here...........


  // servise update here..........
  if(isset($_POST['update'])){
  if(isset($_GET['update'])){
    $id = $_GET['update'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title && $description && $icon){
     $query_con = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
     mysqli_query($db,$query_con);
     $_SESSION['update'] = "Service update Seccefully...!!";
     header('location: service.php');
    }
  }
  }
  // servise update here..........

  // servise delete here..........
  
  if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

   $query= "DELETE FROM services WHERE id='$id'";
   mysqli_query($db,$query);
   $_SESSION['update'] = "Service update Seccefully...!!";
  header('location: service.php');
    }
  
 // servise delete here..........
?>