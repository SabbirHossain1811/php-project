<?php
include '../../config/database.php';

if(isset($_POST['brandtbtn'])){
    // $id = $_SESSION['author_id'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);


    if($image){
        $new_name = $id . '-'.$image. date('d-m-Y').'-' . rand(0,9999). '.'. $extension;
  
        $localpath = '../../public/update/brand/'.$new_name;
  
        if(move_uploaded_file($tmp_name,$localpath)){
        $insert_query = " INSERT INTO brands (image) VALUES ('$new_name')";
        mysqli_query($db,$insert_query);
  
  
          header('location: brand.php');
        }
      }
  }
  

//   actiive deactive srart here...........
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $select_query = "SELECT * FROM brands WHERE id='$id'";
    $connect = mysqli_query($db,$select_query);
    $brand = mysqli_fetch_assoc($connect);

    if($brand['status'] == 'deactive'){
        $update_query = "UPDATE brands SET  status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);

        header('location: brand.php');
    }else{
        $update_query = "UPDATE brands SET  status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);

        header('location: brand.php');
    }
}

//   actiive deactive srart here...........
?>