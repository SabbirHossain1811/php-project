<?php
include '../header/header.php';

//  portfolio  data base select here.........
$contact_query = "SELECT * FROM contacts ";
$contacts = mysqli_query($db,$contact_query );



?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
                <h3 style="font-weight: bold;">Contact....!!</h3>
                <a href="contact_create.php" name="add-btn" type="submit" class="btn btn-primary"><i class="material-icons">add</i>Create</a>
            </div>
            <div class="card-body">
                <div class="example-content">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Addres</th>
                                <th scope="col">Number</th>
                                <th scope="col">description</th>
                                <th scope="col">status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $num = 1;
                            ?>

                            <?php foreach ($contacts as $contact): ?>

                                <tr style="font-weight: bold;">

                                    <th scope="row">
                                    <?= $num++; ?>
                                    </th>

                                    <td style="font-size: 12px;">
                                       <?= $contact['addares'] ?>
                                    </td>

                                    <td style="font-size: 12px;">
                                    <?= $contact['number'] ?>
                                    </td>

                                    <td>
                                        <a href="contact_manage.php?statusid=<?= $contact['id']  ?>" style="font-size:14px; padding:7px" class="<?= ($contact['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white " href=""><?= $contact['status'] ?></a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around align-items-center">
                                            <a href="contact_edit.php?editid=<?= $contact['id'] ?>" class="text-primary fa-2x">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="contact_manage.php?deleteid=<?= $contact['id'] ?>" class="text-danger fa-2x">
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