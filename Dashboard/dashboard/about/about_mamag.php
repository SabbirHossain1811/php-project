<!-- <?php
// session_start();
// include '../../config/database.php';

// if (isset($_POST['aboutImg'])) {
//     $image = $_FILES['about_Img']['name'];
//     $tmp_path = $_FILES['about_Img']['tmp_name'];

//     if ($image) {
//         $id = $_SESSION['author_id'];
//         $name = $_SESSION['author_name'];
//         $explode = explode('.', $image);
//         $extension = end($explode);
//         $new_name = $id . "-" . $name . "-" . date("d-m-Y") . '.' . $extension;
//         $local_path = "../../public/update/About/" . $new_name;

//         if (move_uploaded_file($tmp_path, $local_path)) {
//             // Use UPDATE if you are updating an existing user's image
//             // $update_query = "UPDATE users SET about_Img='$new_name' WHERE id='$id'";
            
//             // If you intend to insert a new record, use this:
//             $insert_query = "INSERT INTO users (about_Img) VALUES ('$new_name')";
            
//             if (mysqli_query($db, $update_query)) {
//                 header('Location: about.php');
//         } else {
//             echo "Failed to upload the image.";
//         }
//     }
// }
// }
?> -->
