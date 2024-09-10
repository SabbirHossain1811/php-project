
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your UserName...!! </h4>
            </div>
            <form style="margin-top:-20px" action="setting-manag.php" method="POST">
                <div class="card-body">
                    <label style="font-weight: bold; " for="exampleInputEmail1" class="form-label">UserName</label>
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



    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your Password...!! </h4>
            </div>
            <form action="setting-manag.php" method="POST">
                <div class="card-body">
                    <label style="font-weight: bold; margin-top:5px;" for="exampleInputEmail1" class="form-label">Current Password...!!</label>

                    <input style="font-size: 15px;" type="password" name="oldpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Current password.....!!">


                    <label style="font-weight: bold;  margin-top:15px;" for="exampleInputEmail1" class="form-label">New Password...!!</label>
                    <input style="font-size: 15px;" type="password" name="newpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Update password.....!!">

                    <label style="font-weight: bold;  margin-top:15px;" for="exampleInputEmail1" class="form-label"> Confrim Password...!!</label>
                    <input style="font-size: 15px;" type="password" name="cpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update Confrim password.....!!">
                    <!-- php success code -->
                    <?php if (isset($_SESSION['pass_update'])) : ?>
                        <div style="font-size:16px;" id="emailHelp" class="form-text text-success">
                            <?= $_SESSION['pass_update'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['pass_update']); ?>
                    <!-- php success code -->
                    <!-- php error code -->
                    <?php if (isset($_SESSION['pass_error'])) : ?>
                        <div style="font-size:16px;" id="emailHelp" class="form-text text-danger">
                            <?= $_SESSION['pass_error'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['pass_error']); ?>
                    <!-- php error code -->

                    <div class="d-grid gap-2">
                        <button style=" font-size: 15px; font-weight: bold;" class="btn btn-primary mt-4" type="submit" name="passubtn">Update..!!</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div  class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your Email...!! </h4>
            </div>
            <form style="margin-top:-20px" action="setting-manag.php" method="POST">
                <div class="card-body">
                    <label style="font-weight: bold;" for="exampleInputEmail1" class="form-label">Email...!!</label>
                    <input style="font-size: 15px;" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update Email.....!!">


                    <?php if (isset($_SESSION['update-success'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-success "><?php echo $_SESSION['update-success'] ?></div>
                    <?php endif;
                    unset($_SESSION['update-success']) ?>


                    <?php if (isset($_SESSION['email_error'])) : ?>
                        <div style="font-size: 15px;" id="emailHelp" class="form-text text-danger ">
                            <?= $_SESSION['email_error'] ?>
                        </div>
                    <?php endif;
                    unset($_SESSION['email_error']) ?>
                    <div class="d-grid gap-2">
                        <button style=" font-size: 15px; font-weight: bold;" class="btn btn-primary mt-4" type="submit" name="emailbtnn">Update..!!</button>

                    </div>
                </div>
            </form>



        </div>
    </div>


<!-- 
    IMAGE UPDATE HERE  -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 style="font-weight: bold;"> Update Your Image...!! </h4>
            </div>
            <form action="setting-manag.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <label style="font-weight: bold; margin-top:5px;" for="exampleInputEmail1" class="form-label"> Image Update...!!</label>

                    <input style="font-size: 15px;" type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Image Update.....!!">

                    <div class="d-grid gap-2">
                        <button style=" font-size: 15px; font-weight: bold;" class="btn btn-primary mt-4" type="submit" name="imgbtn">Update..!!</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- //IMAGE UPDATE HERE// -->
</div>
<?php

include '../header/footer.php';

?>