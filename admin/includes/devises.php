<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
$data = new devise;
$all = $data->afficher();
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
                        <a class="icon " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus-circle-fill h4"></i></a>
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
                    <h5 class="card-title">Devise</h5>

                    <table class="table table-borderless datatable">
                        <thead class=" text-center">
                            <tr>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">TAUX</th>
                                <th scope="col">STATUTS</th>
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
                            foreach ($all as $key => $val) {
                            ?>
                                <tr>
                                    <td><?= $val['description'] ?></td>
                                    <td><?= $val['taux'] ?></td>
                                    <td>
                                        <?php
                                        if ($val['statuts'] == 0) {
                                        ?>

                                        <?php
                                        } elseif ($val['statuts'] == 1) {
                                        ?>
                                            <span class="badge bg-success">En Usage</span>
                                        <?php
                                        }
                                        ?>


                                    </td>
                                    <?php
                                    if ($_SESSION['ROLE'] != 0) {
                                    ?>
                                        <td class="fw bold text-center mx-auto mx-2">
                                            <a href=" ./devise.php?id=<?= $val['id'] ?>">
                                                <span class="badge bg-success ms-5">
                                                    <i class="bi bi-pencil-square fa-lg "></i>
                                                </span>
                                            </a>
                                            <a href="../admin/processing/deletedevise.php?id=<?= $val['id'] ?>">
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
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Nouvelle Devise</h5>
                <button type="button" class="btn-close h2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3">
                <form method="POST" action="../admin/processing/adddevise.php">
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="taux" type="number" min="0" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Taux</label>
                    </div>

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