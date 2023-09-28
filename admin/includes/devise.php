<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
$data = new devise();
$id = $_GET['id'];
$data->setId($id);
$all = $data->afficherbyid();
?>
<!-- Right side columns -->
<div class="col-lg-12">
    <div class="row">
        <!-- Recent Entries -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="filter">

                </div>

                <div class="card-body">
                    <h5 class="card-title mb-4">Devise <span>| Modification</span></h5>
                    <?php
                    foreach ($all as $key => $val) {
                    ?>

                        <form method="POST" action="../admin/processing/updatedevise.php">
                            <div class="row">
                                <div class="col-sm-2 col-xxl-4">

                                </div>
                                <div class="col-sm-8 col-xxl-6">
                                    <input type="hidden" name="id" value="<?= $val['id'] ?>" />
                                    <div class="form-floating mb-3">
                                        <input value="<?= $val['description'] ?>" name="description" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Description</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input value="<?= $val['taux'] ?>" name="taux" type="number" min="0" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Taux</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input min="0" max="1" value="<?= $val['statuts'] ?>" name="statuts" type="number" min="0" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Statuts</label>
                                    </div>

                                    <div class="row mb-3 text-center">
                                        <div class="col-sm-10 text-center ms-2">
                                            <button name="update" type="submit" class="btn btn-success fw-bold">Modifier</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-xxl-4">

                                </div>
                            </div>

                        <?php
                    }
                        ?>
                        </form>
                </div>
            </div>
        </div><!-- End Recent Entries -->
    </div>
</div>
<!-- End Right side columns -->