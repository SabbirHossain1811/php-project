<?php
include '../header/header.php';



$services_query = "SELECT * FROM services";
 $services= mysqli_query($db,$services_query );

?>


<div class="row">
<div class="col">
        <?php if (isset($_SESSION['create-now'])) : ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-dark"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span style="font-size:20px; color:green" class="alert-title"> <i style="font-size:35px; color:tomato" class="fa-solid fa-person-drowning"></i><?=$_SESSION['create-now'] ?></span>
                </div>
            </div>
        <?php endif;
        unset($_SESSION['create-now']); ?>
    </div>
</div>





<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">Services....!!</h3>
                <a href="create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>   
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Title</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $num =1;
                            ?>
                        
                            <?php foreach($services as $service): ?>
                               
                            <tr style="font-weight: bold;">
                            
                                <th scope="row">
                                <?= $num++;?>
                                </th>
                                <td>
                                <?= $service['icon'] ?>
                                </td>
                                <td>
                                <?= $service['title'] ?>
                                </td>
                                <td>
                               <a style="font-size:14px; padding:7px" class="badge bg-danger text-white " href=""><?= $service['status'] ?></a>
                                </td>
                                <td>Deactive</td>
                            </tr>
                            <?php endforeach;?>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../header/footer.php';

?>