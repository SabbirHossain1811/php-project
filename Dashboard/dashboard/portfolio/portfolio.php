<?php
include '../header/header.php';

//  portfolio  data base select here.........
$portfolio_query = "SELECT * FROM portfolio ";
$portfolios = mysqli_query($db,$portfolio_query);

$portfolio = mysqli_fetch_assoc($portfolios);

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
                <h3 style="font-weight: bold;">portfolio....!!</h3>
                <a href="p-create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">Title</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($portfolio)) : ?>
                                <tr>
                                    <td style="font-size:20px;" colspan="5" class="text-danger text-center ">
                                        No Data Found
                                    </td>
                                </tr>
                                <?php else :?>
                        <?php
                            $num = 1;
                            ?>

                            <?php foreach ($portfolios as $portfoli): ?>

                                <tr style="font-weight: bold;">

                                    <th scope="row">
                                    <?= $num++; ?>
                                    </th>
                                    <td>
                                     <img style="width: 60px; height: 60px; border-radius:50%" src="../../public/update/portfolios/<?= $portfoli['image'] ?>" alt="">
                                    </td>
                                    <td>
                                    <?= $portfoli['title'] ?>
                                    </td>
                                    <!-- <td>
                                    <?= $portfoli['subtitle'] ?>
                                    </td> -->
                                    <!-- <td>
                                      <?= $portfoli['description'] ?>
                                    </td>
                                     -->
                                    <td>
                                        <a href="store.php?statusid=<?= $portfoli['id']  ?>" style="font-size:14px; padding:7px" class="<?= ($portfoli['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?=$portfoli['status'] ?></a>
                                    </td>
                                    <td>
                                    <div class="d-flex justify-content-around align-items-center">
                                            <a href="p-edit.php?editid=<?= $portfoli['id'] ?>" class="text-primary fa-2x">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="store.php?deleteid=<?= $portfoli['id'] ?>" class="text-danger fa-2x">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
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