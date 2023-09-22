<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
require_once("../Class/cotisation.php");
$motif = new cotisation();
$id = $_GET['id'];
$motif->setId($id);
$allm = $motif->afficherbyid();
$data = new devise();
$all = $data->afficherbystatuts();
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
                    <h5 class="card-title mb-4">Motif <span>| Modification</span></h5>
                    <?php
                    foreach ($allm as $key => $valm) {
                    ?>

                    <form method="POST" action="../admin/processing/updatemotif.php">
                        <div class="row">
                            <div class="col-sm-2 col-xxl-4">

                            </div>
                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                            <div class="col-sm-8 col-xxl-6">
                                <div class="form-floating mb-3">
                                    <input value="<?= $valm['DESCRIPTION'] ?>" name="description" type="text"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input value="<?= $valm['MONTANT'] ?>" name="montant" type="text"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Montant à payer</label>
                                </div>
                                <?php
                                    foreach ($all as $key => $val) {
                                    ?>
                                <div class="form-floating mb-3">
                                    <input readonly name="devise" value="<?= $val['description'] ?>" type="text"
                                        class="form-control" id="floatingInput">
                                    <label for="floatingInput">Devise</label>
                                </div>
                                <?php
                                    }
                                    ?>

                                <div class="row mb-3 text-center">
                                    <div class="col-sm-10 text-center ms-2">
                                        <button name="update" type="submit"
                                            class="btn btn-success fw-bold">Modifier</button>
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