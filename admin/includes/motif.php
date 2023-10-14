<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
require_once("../Class/cotisation.php");
require_once("../Class/paiement.php");
$data = new devise();
$all = $data->afficherbystatuts();
$motif = new cotisation();
$motif_d = $motif->afficher();
$paie = new paiement();

?>
<!-- Right side columns -->
<div class="col-lg-12">
    <div class="row">
        <!-- Recent motifs -->
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
                    <h5 class="card-title">Motifs </h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">DEVISE</th>
                                <th scope="col">MONTANT</th>
                                <th scope="col">TAUX</th>
                                <th scope="col">TOTAL PAIE PAR MOTIF</th>
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
                            foreach ($motif_d as $keym => $valm) {
                            ?>
                            <tr>
                                <th><?= $valm['DESCRIPTION'] ?></th>
                                <td><?= $valm['devise'] ?></td>
                                <td><?= $valm['MONTANT'] ?></td>
                                <td><?= $valm['taux'] ?></td>
                                <?php
                                    $paie->setCotisation($valm['id']);
                                    $gettot = $paie->summotif();
                                    foreach ($gettot as $keytot => $valtot) {
                                    ?>

                                <td><?= $valtot['summotif'] ?></td>
                                <?php
                                    }
                                    ?>
                                <?php
                                    if ($_SESSION['ROLE'] != 0) {
                                    ?>
                                <td>
                                    <a href=" ./upmotif.php?id=<?= $valm['id'] ?>">
                                        <span class="badge bg-success ms-2">
                                            <i class="bi bi-pencil-square fa-lg "></i>
                                        </span>
                                    </a>
                                    <a href="../admin/processing/deletemotif.php?id=<?= $valm['id'] ?>">
                                        <span class="badge bg-danger ms-2">
                                            <i class="bi bi-trash fa-lg "></i>
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
        </div><!-- End Recent motifs -->
    </div>
</div>
<!-- End Right side columns -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 ">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Nouveau Motif</h5>
                <button type="button" class="btn-close h2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3">
                <form method="POST" action="../admin/processing/addmotif.php?">
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="montant" type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
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