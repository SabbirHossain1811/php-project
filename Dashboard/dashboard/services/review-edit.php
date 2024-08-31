<?php
include '../header/header.php';
include '../../public/icon/icon.php';

// edit query start here..
if(isset($_GET['editid'])){
    $id = $_GET['editid'];
   $getquery = "SELECT * FROM reviews WHERE id='$id'";
   $connect = mysqli_query($db,$getquery);
   $review = mysqli_fetch_assoc($connect);
}
// edit query start here..
?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;">Review Edit...!!</h4>
            </div>

            <div class="card-body">
                <form action="store.php?updatee=<?= $review['id'] ?>" method="POST">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Service Title</label>
                    <input style="font-size: 15px;" type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $review['title'] ?>">

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Service description</label>
                    <textarea style="font-size: 15px;" type="text" name="description" class="form-control" rows-5><?= $review['description'] ?></textarea>

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input style="font-size: 15px;" type="text " readonly name="icon" class="form-control" id="icon" aria-describedby="emailHelp" value="<?= $review['icon'] ?>">

                            <div class="card my-3">
                                <div style="font-size:25px; overflow:scroll;  overflow-x:hidden; height:400px" class="card-body ">
                                   <?php foreach($fonts as $font): ?>
                                    <span class="m-2">
                                    <i onclick="Myfun(event)" class="<?= $font ?>"></i>
                                    </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                

                    <button name="updatee" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Update</button>   
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $input = document.querySelector('#icon');

    function Myfun(e){
        $input.value = e.target.classList.value;
    }
</script>
<?php
include '../header/footer.php';

?>