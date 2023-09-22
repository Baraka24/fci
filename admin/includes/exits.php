<?php
require_once("../includes/link_db.php");
require_once("../Class/devise.php");
require_once("../Class/sortie.php");
$dev = new devise();
$all_dev = $dev->afficher();
$data = new sortie();
$all = $data->afficherall();
?>
<!-- Right side columns -->
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
                    <h5 class="card-title">Entrées récentes <span>| Today</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">DEVISE</th>
                                <th scope="col">MONTANT</th>
                                <th scope="col">TAUX</th>
                                <th scope="col">TOTAL</th>
                                <th scope="col">OBSERVATION</th>
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
                            foreach ($all as $key => $val) { ?>
                            <tr>
                                <th><?= $val['ddate'] ?></th>
                                <td><?= $val['description'] ?></td>
                                <td><?= $val['devise'] ?></td>
                                <td><?= $val['montant'] ?></td>
                                <td><?= $val['taux'] ?></td>
                                <td><?= $val['total'] ?></td>
                                <td><?= $val['observation'] ?></td>
                                <?php
                                    if ($_SESSION['ROLE'] != 0) {
                                    ?>
                                <td>
                                    <a href=" ./upsortie.php?id=<?= $val['id'] ?>">
                                        <span class="badge bg-success ms-0">
                                            <i class="bi bi-pencil-square fa-lg "></i>
                                        </span>
                                    </a>
                                    <a href="../admin/processing/deletesortie.php?id=<?= $val['id'] ?>">
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
        </div><!-- End Recent Entries -->
    </div>
</div>
<!-- End Right side columns -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 ">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Nouvelle Sortie</h5>
                <button type="button" class="btn-close h2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3">
                <form method="POST" action="../admin/processing/addsortie.php">
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <input name="date" type="date" value="<?php date('Y-m-d') ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="description" type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select required name="devise" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Selectionner une devise</option>
                            <?php
                            foreach ($all_dev as $keydev => $valdev) { ?>

                            <option value="<?= $valdev['id'] ?>"><?= $valdev['description'] ?></option>
                            <?php }   ?>
                        </select>
                        <label for="floatingSelect">Selectionner la devise</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input required name="montant" type="number" min="0" class="form-control" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Montant</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea required name="observation" class="form-control" placeholder="Leave a comment here"
                            id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Observation</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
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