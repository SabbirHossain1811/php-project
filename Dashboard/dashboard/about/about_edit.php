<?php
include '../header/header.php';
include '../../public/icon/icon.php';

// edit query start here..
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
   $getquery = "SELECT * FROM about WHERE id='$id'";
   $connect = mysqli_query($db,$getquery);
   $about = mysqli_fetch_assoc($connect);
}
// edit query start here..
?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;">About Edit...!!</h4>
            </div>

            <div class="card-body">
                <form action="about_mamag.php?updateid=<?= $about['id'] ?>" method="POST" enctype="multipart/form-data">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">about description</label>
                    <textarea style="font-size: 15px;" type="text" name="description" class="form-control" rows-5><?= $about['description'] ?></textarea>

                    <picture>
                        <img id="chng-img" src="../../public/update/defult/funny.jpg" alt="" style="width: 100%; height:400px; object-fit:contain">
                    </picture>
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label my-2">About Image</label>
                    <input name="image" onchange="document.querySelector('#chng-img').src = window.URL.createObjectURL(this.files[0])" style="font-size: 15px;" type="file" class="form-control" id="icon" aria-describedby="emailHelp">
                    <button name="update" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Update</button>   
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../header/footer.php';

?>