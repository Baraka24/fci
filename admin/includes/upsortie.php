<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
require_once("../Class/sortie.php");
$dev = new devise();
$all_dev = $dev->afficher();
$data = new sortie();
$id = $_GET['id'];
$data->setId($id);
$all = $data->afficherall()

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
                    <h5 class="card-title mb-4">Entrée <span>| Modification</span></h5>
                    <?php
                    foreach ($all as $key => $val) { ?>

                    <form method="POST" action="../admin/processing/updatesortie.php">
                        <div class="row">
                            <div class="col-sm-2 col-xxl-4">

                            </div>
                            <div class="col-sm-8 col-xxl-6">
                                <input type="hidden" name="id" value="<?= $val['id'] ?>" />
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input name="date" type="date" value="<?php date('Y-m-d') ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required value="<?= $val['description'] ?>" name="description" type="text"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Description</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select required name="devise" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="<?= $val['iddevise'] ?>" selected><?= $val['devise'] ?></option>
                                        <?php
                                            foreach ($all_dev as $keydev => $valdev) { ?>
                                        <option value="<?= $valdev['id'] ?>"><?= $valdev['description'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="floatingSelect">Selectionner la devise</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input required value="<?= $val['montant'] ?>" name="montant" type="number" min="0"
                                        class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Montant</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea required value="" name="observation" class="form-control"
                                        placeholder="Leave a comment here" id="floatingTextarea"
                                        style="height: 100px;"><?= $val['observation'] ?></textarea>
                                    <label for="floatingTextarea">Observation</label>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button name="update" type="submit"
                                            class="btn btn-success fw-bold">Enregistrer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2 col-xxl-4">

                            </div>
                        </div>

                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div><!-- End Recent Entries -->
    </div>
</div>
<!-- End Right side columns -->