<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
require_once("../Class/cotisation.php");
require_once("../Class/membre.php");
require_once("../Class/paiement.php");
$motif = new cotisation();
$motif_d = $motif->afficherall();
$dev = new devise();
$all_dev = $dev->afficher();
$memb = new membre();
$allmemb = $memb->afficher();
$paie = new paiement();
$id = $_GET['id'];
$paie->setid($id);
$all = $paie->afficherallid();
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
                    <h5 class="card-title mb-4">Paiement <span>| Modification</span></h5>

                    <?php
                    foreach ($all as $key => $val) {
                    ?>

                        <form method="POST" action="../admin/processing/updatecontribution.php">
                            <div class="row">
                                <div class="col-sm-2 col-xxl-4">

                                </div>
                                <input type="hidden" name="id" value="<?php echo $id ?>" />
                                <div class="col-sm-8 col-xxl-6">
                                    <div class="form-floating mb-3">
                                        <select required name="membre" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="<?= $val['idmembre'] ?>" selected>
                                                <?= $val['nom'] . " " . $val['postnom'] . " " . $val['prenom'] ?></option>
                                            <?php
                                            foreach ($allmemb as $keymemb => $valmemb) {
                                            ?>
                                                <option value="<?= $valmemb['ID'] ?>">
                                                    <?= $valmemb['NOM'] . " " . $valmemb['POSTNOM'] . " " . $valmemb['PRENOM'] ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">Selectionner un membre</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input required value="<?= $val['montant'] ?>" name="montant" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Montant</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select required name="devise" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="<?= $val['iddevise'] ?>" selected><?= $val['devise'] ?></option>
                                            <?php
                                            foreach ($all_dev as $keydev => $valdev) { ?>

                                                <option value="<?= $valdev['id'] ?>"><?= $valdev['description'] ?></option>
                                            <?php }   ?>
                                        </select>
                                        <label for="floatingSelect">Selectionner la devise</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select required name="motif" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="<?= $val['cotisation'] ?>" selected><?= $val['motif'] ?></option>
                                            <?php
                                            foreach ($motif_d as $keym => $valm) {
                                            ?>
                                                <option value="<?= $valm['ID'] ?>"><?= $valm['DESCRIPTION'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <label for="floatingSelect">Selectionner un motif</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <input required name="date" value="<?php echo date('dd/mm/aaaa'); ?>" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3 text-center">
                                        <div class="col-sm-10 text-center">
                                            <button name="update" type="submit" class="btn btn-primary fw-bold">Enregistrer</button>
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