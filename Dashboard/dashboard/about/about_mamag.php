<?php
session_start();
include '../../config/database.php';

if (isset($_POST['aboutbtn'])) {
    $image = $_FILES['image']['name'];
    $tmp_path = $_FILES['image']['tmp_name'];
    $description = $_POST['description'];
    $activity = $_POST['activity'];

    if ($image) {
        $id = $_SESSION['author_id'];
        $name = $_SESSION['author_name'];
        $explode = explode('.',$image);
        $extention = end($explode);
        $new_name = '-' . $image . date('d-m-Y') .'-'.rand(0,9999) .'.'. $extention;
        $local_path = "../../public/update/aboutt/".$new_name;

        if (move_uploaded_file($tmp_path, $local_path)) {
            $insert_query = "INSERT INTO about (image, description, activity) VALUES ('$new_name', '$description', '$activity')";
            
            if (mysqli_query($db,$insert_query)) {
                header('Location: about.php');
            }else{
                echo 'kharp';
            }
        }
    }
}

// active deactive start here......
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $getquery = "SELECT * FROM about WHERE id='$id'";
    $connect = mysqli_query($db,$getquery);
    $about = mysqli_fetch_assoc($connect);
 
 
    if($about['status'] == 'deactive'){
     $update_query = "UPDATE about SET status='active' WHERE id='$id'";
     mysqli_query($db,$update_query);
    //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
     header('location:about.php');
    }else{
     $update_query = "UPDATE about SET status='deactive' WHERE id='$id'";
     mysqli_query($db,$update_query);
    //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
     header('location: about.php');
    }
   }



//    delete start here.........

   if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $port_query = "SELECT * FROM about WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);


   if($port['image']){
    $oldname = $port['image'];
    $existspath = '../../public/update/aboutt/'.$oldname ;


    if(file_exists($existspath )){
        unlink($existspath );
    }
   }

   $delete_query = "DELETE FROM about WHERE id='$id'";
   mysqli_query($db,$delete_query);
//    $_SESSION['update'] = "Service update Seccefully...!!";
  header('location: about.php');
    }
  
 
// active deactive start here......


// update start here..............

if(isset($_POST['update'])){
    if(isset($_GET['updateid'])){
        $id = $_GET['updateid'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        if($image){
            
            $explode = explode('.',$image);
            $extension = end($explode);
            $new_name = $id . '_' . $image . '_'.  date('Y') . rand(0,9999) . '.' . $extension;
            $localpath = '../../public/update/aboutt/' . $new_name;
            $old_img_query = "SELECT * FROM about WHERE id='$id'";
            $connect = mysqli_query($db,$old_img_query);
            $about = mysqli_fetch_assoc($connect);

            if($about['image']){
                $oldpath = '../../public/update/aboutt/'. $about['image'];
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }

            if(move_uploaded_file($image_tmp,$localpath)){
                $update_query = "UPDATE about SET description='$description',image='$new_name' WHERE id='$id'";
                mysqli_query($db,$update_query);
                $_SESSION['port_success'] = "Portfolio Update Successfully Complete";
    
                header('location: about.php');
            }

        }else{
            $update_query = "UPDATE about SET description='$description',image='$new_name' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['port_success'] = "Portfolio Update Successfully Complete";

            header('location: about.php');
           
        }
    }
}
// update start here..............
?>
