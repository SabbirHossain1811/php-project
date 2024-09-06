<?php
include '../header/header.php';

//  portfolio  data base select here.........
$brands_query = "SELECT * FROM brands ";
$brands = mysqli_query($db, $brands_query);
$brand = mysqli_fetch_assoc($brands);



?>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">brands....!!</h3>
                <a href="brand_create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $num = 1;
                            ?>

                            <?php foreach ($brands as $brand): ?>
                                <tr style="font-weight: bold;">

                                    <th scope="row">
                                    <?= $num++; ?>
                                    </th>

                                    <td style="font-size: 12px;">
                                    
                                     <img style="width: 60px; height: 60px; border-radius:50%" src="../../public/update/brand /<?= $brand['image'] ?>" alt="">
                                    
                                    </td>
                                     
                                    <td>
                                        <a href="brand_manage.php?statusid=<?= $brand['id']  ?>" style="font-size:14px; padding:7px" class="<?= ($brand['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?= $brand['status'] ?></a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <a href="brand_edit.php?editid=<?= $brand['id'] ?>" class="text-primary fa-2x">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="brand_manage.php?deleteid=<?= $brand['id'] ?>" class="text-danger fa-2x">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
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