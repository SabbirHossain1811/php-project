<?php

include '../header/header.php';
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>



<div style="margin-top: 30px;" class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your UserName...!! </h4>
            </div>
            <form action="setting-manag.php" method="POST">
                <div class="card-body">
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label">UserName</label>
                    <input style="font-size: 15px;" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update UserName.....!!">
                    <!-- name update succss here........... -->
                    <?php if (isset($_SESSION['update-succss'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-success ">
                            <?= $_SESSION['update-succss'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['update-succss']); ?>
                    <!-- name update succss here........... -->
                    <!-- name update eror here........... -->
                    <?php if (isset($_SESSION['update-name'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-danger ">
                            <?= $_SESSION['update-name'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['update-name']); ?>
                    <!-- name update eror here........... -->
                    <div class="d-grid gap-2">
                        <button style=" font-size: 15px; font-weight: bold;" class="btn btn-primary mt-4" type="submit" name="btnn">Update..!!</button>

                    </div>
                </div>
            </form>



        </div>
    </div>
</div>


<!-- password update here............... -->
<div style="margin-top: 50px;" class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your Email...!! </h4>
            </div>
            <form action="setting-manag.php" method="POST">
                <div class="card-body">
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label">Email...!!</label>
                    <input style="font-size: 15px;" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update Email.....!!">
                    <!-- email update succss here........... -->
                    <?php if (isset( $_SESSION['update-success'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-success ">
                            <?= $_SESSION['update-success'] ?>
                        </div>
                    <?php endif;
                    unset( $_SESSION['update-success']); ?>
                    <!--email  update succss here........... -->

                    <!--email  update eror here........... -->
                    <?php if (isset($_SESSION['email_error'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-danger ">
                            <?=$_SESSION['email_error'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['email_error']); ?>
                    <!--email  update eror here........... -->
                    <div class="d-grid gap-2">
                        <button style=" font-size: 15px; font-weight: bold;" class="btn btn-primary mt-4" type="submit" name="emailbtnn">Update..!!</button>

                    </div>
                </div>
            </form>



        </div>
    </div>
</div>
<!-- password update here............... -->






<?php
include '../header/footer.php';
?>