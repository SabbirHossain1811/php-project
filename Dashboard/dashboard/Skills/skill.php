<?php
include '../header/header.php';

// portfolio database select
$education_query = "SELECT * FROM education ";
$education = mysqli_query($db,$education_query);


// $portfolio = mysqli_fetch_assoc($portfolios);

// reviews  data base select here.........
// $_GET[$service['id']]

?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">Education....!!</h3>
                <a href="skill_create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Year</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $num = 1;
                            ?>
                            <?php foreach ($education as $educatio): ?>
                            <tr style="font-weight: bold;">
                                <th scope="row">
                                <?= $num++; ?>
                                </th>
                                <td>
                                    <?= $educatio['year']  ?>
                                </td>
                                <td>
                                    <?= $educatio['description'] ?>
                                </td>
                                <td>
                                        <a href="skill_manage.php?statusid=<?= $educatio['id'] ?>" style="font-size:14px; padding:7px" class="<?= ($educatio['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?=$educatio['status'] ?></a>
                                    </td>
                                <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                        <a href="skill_edit.php?editid=<?= $educatio['id'] ?>" class="text-primary fa-2x">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="skill_manage.php?deleteid=<?= $educatio['id'] ?>" class="text-danger fa-2x">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
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


<?php
include '../header/footer.php';

?>