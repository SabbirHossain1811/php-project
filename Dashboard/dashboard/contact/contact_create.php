<?php
include '../header/header.php';
include '../../public/icon/icon.php';

?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4>Contact Add</h4>
            </div>

            <div class="card-body">
                <form action="contact_manage.php" method="POST" enctype="multipart/form-data">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2"> Contact Addars </label>
                    <textarea style="font-size: 15px;" type="text" name="addares" class="form-control" rows-5></textarea>

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2"> Contact Number </label>
                    <input style="font-size: 15px;" type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <picture>
                        <img id="chng-img" src="../../public/update/defult/cat.jpg" alt="" style="width: 100%; height:400px; object-fit:contain">
                    </picture>
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Quotes Image</label>
                    <input name="image" onchange="document.querySelector('#chng-img').src = window.URL.createObjectURL(this.files[0])" style="font-size: 15px;" type="file"  class="form-control" id="icon" aria-describedby="emailHelp">

                    <button name="contactbtn" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../header/footer.php';

?>