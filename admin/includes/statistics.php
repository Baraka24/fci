<?php
require_once("../includes/link_db.php");
require_once("../Class/entree.php");
require_once("../Class/sortie.php");
require_once("../Class/membre.php");
require_once("../Class/paiement.php");
$entree = new entree();
$sume = $entree->sum();
$sortie = new sortie();
$sums = $sortie->sum();
$membre = new membre();
$summ = $membre->sum();
$paie = new paiement();
$sump = $paie->sum();
$paie->setMembre($_SESSION['ID']);
$sumw = $paie->sumwhere();
?>
<!-- Left side columns -->
<div class="col-lg-12">
    <div class="row">
        <?php
    if ($_SESSION['ROLE'] == 1) {
    ?>
        <!-- Entrées Card -->
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Total Entrée <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($sume as $key => $val) {
                ?>
                            <h6><?= $val['totalentree'] ?></h6>
                            <?php
                }
                ?>
                            <span class="text-success small pt-1 fw-bold">Monnaie d'Usage</span> <span
                                class="text-muted small pt-2 ps-1"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Entrées Card -->

        <!-- Sorties Card -->
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Total sortie <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($sums as $key => $val) {
                ?>
                            <h6><?= $val['totalsortie'] ?></h6>
                            <?php
                } ?>
                            <span class="text-success small pt-1 fw-bold">Monnaie d'Usage</span> <span
                                class="text-muted small pt-2 ps-1"></span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sorties Card -->

        <!-- Solde Card -->
        <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Solde <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($sume as $key => $vale) {
                ?>

                            <?php
                  foreach ($sums as $key => $vals) {
                  ?>
                            <h6><?= $vale['totalentree'] - $vals['totalsortie'] ?></h6>
                            <?php
                  } ?>
                            <?php
                }
                ?>
                            <span class="text-success small pt-1 fw-bold">Monnaie d'Usage</span> <span
                                class="text-muted small pt-2 ps-1"></span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sorties Card -->

        <!-- Membres Card -->
        <div class="col-xxl-4 col-md-6">

            <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Total Membre <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($summ as $key => $val) {
                ?>
                            <h6><?= $val['totalmembre'] . " Membres" ?></h6>
                            <?php
                }
                ?>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- End Membres Card -->
        <!-- Sorties Card -->
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

                <div class="card-body">
                    <h5 class="card-title">Total Paiement <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($sump as $key => $val) {
                ?>
                            <h6><?= $val['totalpaiement'] ?></h6>
                            <?php
                } ?>
                            <span class="text-success small pt-1 fw-bold">Monnaie d'Usage</span> <span
                                class="text-muted small pt-2 ps-1"></span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sorties Card -->

        <?php
    } else if ($_SESSION['ROLE'] == 0) {
    ?>
        <!-- Sorties Card -->
        <div class="col-xxl-12 col-md-12">
            <div class="card info-card revenue-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filtrer</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                        <li><a class="dropdown-item" href="#">Ce mois</a></li>
                        <li><a class="dropdown-item" href="#">Cette année</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Total Paiement <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="ps-3">
                            <?php
                foreach ($sumw as $key => $val) {
                ?>
                            <h6><?= $val['totalpaiement'] ?></h6>
                            <?php
                } ?>
                            <span class="text-success small pt-1 fw-bold">Monnaie d'Usage</span> <span
                                class="text-muted small pt-2 ps-1"></span>

                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sorties Card -->
        <?php
    }
    ?>
    </div>
</div>