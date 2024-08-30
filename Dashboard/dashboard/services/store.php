<?php
  include '../../config/database.php';
  session_start();


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



?>