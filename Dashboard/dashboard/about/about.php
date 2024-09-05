<?php
include '../header/header.php';

//  portfolio  data base select here.........
$about_query = "SELECT * FROM about ";
$abouts = mysqli_query($db,$about_query);

// $portfolio = mysqli_fetch_assoc($portfolios);

// reviews  data base select here.........
// $_GET[$service['id']]

?>


<div class="row">
    <div class="col">


        
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">About....!!</h3>
                <a href="C_about.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">description</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $num = 1;
                            ?>

                            <?php foreach ($abouts as $about): ?>

                                <tr style="font-weight: bold;">

                                    <th scope="row">
                                    <?= $num++; ?>
                                    </th>
                                    <td>
                                     <img style="width: 60px; height: 60px; border-radius:50%" src="../../public/update/aboutt/<?= $about['image']?>" alt="">
                                    </td>
                                    <td>
                                    <?= $about['description']  ?>
                                    </td>
                                    <td>
                                        <a href="about_mamag.php?statusid=<?= $about['id'] ?>" style="font-size:14px; padding:7px" class="<?= ($about['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?=$about['status'] ?></a>
                                    </td>
                                    <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                            <a href="about_edit.php?editid=<?= $about['id'] ?>" class="text-primary fa-2x">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="about_mamag.php?deleteid=<?= $about['id'] ?>" class="text-danger fa-2x">
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