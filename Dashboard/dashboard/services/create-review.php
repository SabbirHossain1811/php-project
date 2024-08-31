<?php
include '../header/header.php';
include '../../public/icon/icon.php';

?>


<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-header">
                <h4>Review Add</h4>
            </div>

            <div class="card-body">
                <form action="store.php" method="POST">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Review Title</label>
                    <input style="font-size: 15px;" type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Review description</label>
                    <textarea style="font-size: 15px;" type="text" name="description" class="form-control" rows-5></textarea>

                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input style="font-size: 15px;" type="text " readonly name="icon" class="form-control" id="icon" aria-describedby="emailHelp">

                    <div class="card my-3">
                        <div style="font-size:25px; overflow:scroll;  overflow-x:hidden; height:400px" class="card-body ">
                            <?php foreach ($fonts as $font): ?>
                                <span class="m-2">
                                    <i onclick="Myfun(event)" class="<?= $font ?>"></i>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button name="ad-btn" type="submit" class="btn btn-primary mt-4"><i class="material-icons">add</i>Create</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $input = document.querySelector('#icon');

    function Myfun(e) {
        $input.value = e.target.classList.value;
    }
</script>
<?php
include '../header/footer.php';

?>