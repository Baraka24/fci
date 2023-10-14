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
if ($_SESSION['ROLE'] == 1) {
    $all = $paie->afficherall();
} elseif ($_SESSION['ROLE'] == 0) {
    $paie->setMembre($_SESSION['ID']);
    $all = $paie->afficherallwhere();
}

?>
<!-- Right side columns -->
<div class="col-lg-12">
    <div class="row">
        <!-- Recent Entries -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Rapport par Date <span>| Paiements</span></h5>
                    <form method="POST" action="../rapport.php">
                        <div class="row">
                            <div class="col-lg-2 col-md-1 label fw-bold text-center mb-2">Du</div>
                            <div class="col-md-3 mb-2">
                                <input name="date_first" type="date" class="form-control">
                            </div>

                            <div class="col-md-2 text-center mb-2">
                                <button name="save" type="submit" class="btn btn-primary fw-bold "><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div><!-- End Recent Entries -->
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <!-- Recent Entries -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <?php
                if ($_SESSION['ROLE'] != 0) {
                ?>

                <div class="filter">
                    <a class="icon " data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="bi bi-plus-circle-fill h4"></i></a>
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots h4"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filtrer</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                        <li><a class="dropdown-item" href="#">Ce mois</a></li>
                        <li><a class="dropdown-item" href="#">Cette année</a></li>
                    </ul>
                </div>
                <?php
                }
                ?>

                <div class="card-body">
                    <h5 class="card-title">Paiements récents <span>| Today</span></h5>
                    <table class="table table-borderless datatable">
                        <thead class=" text-center">
                            <tr>
                                <th scope="col">NOMS</th>
                                <th scope="col">MOTIF</th>
                                <th scope="col">DEVISE</th>
                                <th scope="col">MONTANT</th>
                                <th scope="col">TAUX</th>
                                <th scope="col">EN DEVISE D'USAGE</th>
                                <?php
                                if ($_SESSION['ROLE'] != 0) {
                                ?>
                                <th scope="col">ACTION</th>
                                <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all as $keypaie => $valpaie) {
                            ?>
                            <tr>
                                <th><?= $valpaie['nom'] . " " . $valpaie['postnom'] . " " . $valpaie["prenom"] ?></th>
                                <td><?= $valpaie['motif'] ?></td>
                                <td><?= $valpaie['devise'] ?></td>
                                <td><?= $valpaie['montant'] ?></td>
                                <td><?= $valpaie['taux'] ?></td>
                                <td><?= $valpaie['total'] ?></td>
                                <?php
                                    if ($_SESSION['ROLE'] != 0) {
                                    ?>
                                <td>

                                    <a href=" ./upcontribution.php?id=<?= $valpaie['id'] ?>">
                                        <span class="badge bg-success ">
                                            <i class="bi bi-pencil-square fa-lg "></i>
                                        </span>
                                    </a>
                                    <a href="../admin/processing/deletepaiement.php?id=<?= $valpaie['id'] ?>">
                                        <span class="badge bg-danger ">
                                            <i class="bi bi-trash fa-lg "></i>
                                        </span>
                                    </a>
                                    <a href="../recu.php?id=<?= $valpaie['id'] ?>">
                                        <span class="badge bg-primary ">
                                            <i class="bi bi-printer fa-lg "></i>
                                        </span>
                                    </a>
                                </td>
                                <?php
                                    }
                                    ?>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </div>

            </div>
        </div><!-- End Recent Entries -->
    </div>
</div>
<!-- End Right side columns -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 ">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Nouvelle Paie</h5>
                <button type="button" class="btn-close h2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3">
                <form method="POST" action="../admin/processing/paiement.php">
                    <div class="form-floating mb-3">
                        <select name="membre" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <?php
                            foreach ($allmemb as $keymemb => $valmemb) {
                            ?>
                            <option value="<?= $valmemb['ID'] ?>">
                                <?= $valmemb['NOM'] . " " . $valmemb['POSTNOM'] . " " . $valmemb['PRENOM'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Selectionner un membre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="motif" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">

                            <?php
                            foreach ($motif_d as $keym => $valm) {
                            ?>
                            <option value="<?= $valm['ID'] ?>">
                                <?= $valm['DESCRIPTION'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Selectionner un motif</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="montant" type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Montant</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="devise" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Selectionner une devise</option>
                            <?php
                            foreach ($all_dev as $keydev => $valdev) { ?>

                            <option value="<?= $valdev['id'] ?>"><?= $valdev['description'] ?></option>
                            <?php }   ?>
                        </select>
                        <label for="floatingSelect">Selectionner la devise</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input name="date" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 text-center">
                        <div class="col-sm-10 text-center">
                            <button name="save" type="submit" class="btn btn-primary fw-bold">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0">

            </div>
        </div>
    </div>
</div>
<!-- End Add Member Modal -->