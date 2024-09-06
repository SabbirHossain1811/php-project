<?php
include '../header/header.php';
include '../../public/icon/icon.php';

?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4>brands Add</h4>
            </div>

            <div class="card-body">
                <form action="brand_manage.php" method="POST" enctype="multipart/form-data">
                   
                    <picture>
                        <img id="chng-img" src="../../public/update/defult/funny.jpg" alt="" style="width: 100%; height:400px; object-fit:contain">
                    </picture>
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes Image</label>
                    <input name="image" onchange="document.querySelector('#chng-img').src = window.URL.createObjectURL(this.files[0])" style="font-size: 15px;" type="file"  class="form-control" id="icon" aria-describedby="emailHelp">

                    <button name="brandtbtn" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../header/footer.php';

?>