<?php
session_start();
include '../../config/database.php';

if(isset($_POST['Quotesbtn'])){

    $description = $_POST['description'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);

    if( $image && $description && $title && $subtitle){
        $newname = $id. '-' . $title . '-' . date('d-m-Y').'-'.rand(0,9999).'.'.$extension;
        $localpath = '../../public/update/quotes/'.$newname;
    

    if(move_uploaded_file($tmp_name,$localpath)){
        $insert_query = "INSERT INTO quotes (image,description,title,subtitle) VALUES ('$newname','$description','$title','$subtitle')";
        mysqli_query($db,$insert_query);


        header('location: quotes.php');
      }
    }
}

// deactive and active start here........
if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];
    $active_query = "SELECT * FROM quotes WHERE id='$id'";
    $connect = mysqli_query($db,$active_query);
    $quote = mysqli_fetch_assoc($connect);

    if($quote['status'] == 'deactive'){
        $update_query = "UPDATE quotes SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location: quotes.php');
       }else{
        $update_query = "UPDATE quotes SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
       //  $_SESSION['update-noww'] = "Service update Seccefully...!!";
        header('location: quotes.php');
       }
      }


    //   delete start here.......
    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
    
        $port_query = "SELECT * FROM quotes WHERE id='$id'";
        $connect = mysqli_query($db,$port_query);
        $port = mysqli_fetch_assoc($connect);
    
    
       if($port['image']){
        $oldname = $port['image'];
        $existspath = '../../public/update/quotes/'.$oldname ;
    
    
        if(file_exists($existspath )){
            unlink($existspath );
        }
       }
    
       $delete_query = "DELETE FROM quotes WHERE id='$id'";
       mysqli_query($db,$delete_query);
    //    $_SESSION['update'] = "Service update Seccefully...!!";
      header('location: quotes.php');
        }
    //   delete start here.......


    //  edit start here.......

    if(isset($_POST['Update'])){
        if(isset($_GET['updateid'])){
            $id = $_GET['updateid'];
            $description = $_POST['description'];
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $image = $_FILES['image']['name'];
    
            if($image){
                $image_tmp = $_FILES['image']['tmp_name'];
    
                $explode = explode('.',$image);
                $extension = end($explode);
                $new_name = $id . '_' . $title . '_'.  date('Y') . rand(0,9999) . '.' . $extension;
                $localpath = '../../public/update/quotes/' . $new_name;
                $old_img_query = "SELECT * FROM quotes WHERE id='$id'";
                $connect = mysqli_query($db,$old_img_query);
                $quote = mysqli_fetch_assoc($connect);
    
                if($quote['image']){
                    $oldpath = '../../public/update/quotes/'. $quote['image'];
                    if(file_exists($oldpath)){
                        unlink($oldpath);
                    }
                }
    
                if(move_uploaded_file($image_tmp,$localpath)){
                    $update_query = "UPDATE quotes SET title='$title',subtitle='$subtitle',description='$description',image='$new_name' WHERE id='$id'";
                    mysqli_query($db,$update_query);
       
                    header('location: quotes.php');
                }
    
            }else{
                $update_query = "UPDATE quotes SET title='$title',subtitle='$subtitle',description='$description' WHERE id='$id'";
                mysqli_query($db,$update_query);
                header('location: quotes.php');
               
            }
        }
    }
?>