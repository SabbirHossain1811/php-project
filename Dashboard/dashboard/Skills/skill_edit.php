<?php
include '../header/header.php';
include '../../public/icon/icon.php';

// edit query start here..
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
   $getquery = "SELECT * FROM education WHERE id='$id'";
   $connect = mysqli_query($db,$getquery);
   $education = mysqli_fetch_assoc($connect);
}
// edit query start here..
?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;">Skill Edit...!!</h4>
            </div>

            <div class="card-body">
                <form action="skill_manage.php?updateid=<?= $education['id'] ?>" method="POST" enctype="multipart/form-data">
                   <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label my-2">Skill Year</label>
                    <input style="font-size: 15px;" type="text" name="year" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $education['year'] ?>">

                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label my-2">Skill description</label>
                    <textarea style="font-size: 15px;" name="description" class="form-control" rows="5"><?= $education['description'] ?></textarea>
                    
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label my-2">Skills</label>
                    <input style="font-size: 15px;" type="text" name="skill" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $education['skill'] ?>">

                    <picture>
                        <img id="chng-img" src="../../public/update/defult/funny.jpg" alt="" style="width: 100%; height:400px; object-fit:contain">
                    </picture>
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label my-2">funny Image</label>
                    <input name="image"style="font-size: 15px;" type="file" class="form-control" id="icon" aria-describedby="emailHelp">

                    <button name="update" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../header/footer.php';

?>