<?php
include '../header/header.php';

// table all data show ..........
$user_query = "SELECT * FROM users";
$users = mysqli_query($db,$user_query);
// table all data show ..........

include '../header/footer.php';
?>


<div class="row">
    <!-- dashBoard Login sussecs Message....... -->
    <div class="col">
        <?php if (isset($_SESSION['temp_name'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title"> <i style="font-size:35px; color:tomato" class="fa-solid fa-person-drowning"></i>Welcome...! Mr. <?= $_SESSION['author_name'] ?></span>
                    <span class="alert-text"><i style="font-size:20px;" class="fa-solid fa-envelope-circle-check"></i> - <b><?= $_SESSION['author_email'] ?></b> </span>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['temp_name']); ?>
    </div>
    <!-- dashBoard Login sussecs Message....... -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action.</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                  $num = 1;
                                  $id =   $_SESSION['author_id'];
                                foreach($users as $user) :
                                if($user['id'] == $id){
                                    continue;
                                }
                                
                                ?>
                                <tr>
                                    <th scope="row">
                                    <?= $num++ ?>
                                    </th>
                                    <td>
                                        <?= $user['name']?>
                                    </td>
                                    <td>
                                    <?= $user['email']?>
                                    </td>
                                    <td>
                                     18-11
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

