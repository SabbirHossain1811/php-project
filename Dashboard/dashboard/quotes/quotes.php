<?php
include '../header/header.php';

//  portfolio  data base select here.........
$quotes_query = "SELECT * FROM quotes ";
$quotes = mysqli_query($db, $quotes_query);
// $quotes = mysqli_fetch_assoc($quotes);

// reviews  data base select here.........
// $_GET[$service['id']]

?>


<div class="row">
    <div class="col">



    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">Quotes....!!</h3>
                <a href="quotes_create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">image</th>
                                <th scope="col">description</th>
                                <th scope="col">Title</th>
                                <th scope="col">SubTitle</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            ?>

                            <?php foreach ($quotes as $quote): ?>

                                <tr style="font-weight: bold;">

                                    <th scope="row">
                                        <?= $num++; ?>
                                    </th>

                                    <td>
                                        <img style="width: 60px; height: 60px; border-radius:50%" src="../../public/update/quotes/<?= $quote['image'] ?>" alt="">
                                    </td>

                                    <td style="font-size: 12px;">
                                        <?= $quote['description'] ?>
                                    </td>

                                    <td style="font-size: 12px;">
                                        <?= $quote['title'] ?>
                                    </td>

                                    <td style="font-size: 12px;">
                                        <?= $quote['subtitle'] ?>
                                    </td>

                                    <td>
                                        <a href="quotes_manag.php?statusid=<?= $quote['id']  ?>" style="font-size:14px; padding:7px" class="<?= ($quote['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?= $quote['status'] ?></a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <a href="quotes_edit.php?editid=<?= $quote['id'] ?>" class="text-primary fa-2x">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="quotes_manag.php?deleteid=<?= $quote['id'] ?>" class="text-danger fa-2x">
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