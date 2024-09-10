<?php
include '../header/header.php';
include '../../public/icon/icon.php';

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $update_qurey= "SELECT * FROM quotes WHERE id='$id'";
    $connect = mysqli_query($db,$update_qurey);
    $quote = mysqli_fetch_assoc($connect);
}
?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4>Quotes Edit..!</h4>
            </div>

            <div class="card-body">
            <form action="quotes_manag.php?updateid=<?= $quote['id']?>" method="POST" enctype="multipart/form-data">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes description</label>
                    <textarea style="font-size: 15px;" type="text" name="description" class="form-control" rows-5> <?= $quote['description'] ?></textarea>

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes Title</label>
                    <input style="font-size: 15px;" type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" <?= $quote['title'] ?>">

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes SubTitle</label>
                    <input style="font-size: 15px;" type="text" name="subtitle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $quote['subtitle'] ?>">


                    <picture>
                        <img id="chng-img" src="../../public/update/defult/cat.jpg" alt="" style="width: 100%; height:400px; object-fit:contain">
                    </picture>
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes Image</label>
                    <input name="image" onchange="document.querySelector('#chng-img').src = window.URL.createObjectURL(this.files[0])" style="font-size: 15px;" type="file"  class="form-control" id="icon" aria-describedby="emailHelp">

                    <button name="Update" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../header/footer.php';

?>