<?php
require_once("../includes/link_db.php");
require_once("../Class/membre.php");
$data = new membre();
$all = $data->afficher();
$last = $data->lastnumber();
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
                    <h5 class="card-title">Membres <span>| Today</span></h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">NOMS</th>
                                <th scope="col">LIEU DE TRAVAIL</th>
                                <th scope="col">PHONE</th>
                                <th scope="col">STATUS</th>
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
                                <th scope="row"><?= $val['NUMERO'] ?></th>
                                <td><?= $val['NOM'] . " " . $val['POSTNOM'] . " " . $val['PRENOM'] ?></td>
                                <td><?= $val['LIEU_DE_TRAVAIL'] ?></td>
                                <td><?= $val['NUMERO_DE_TELEPHONE'] ?></td>

                                <td>
                                    <?php
                                        if ($val['STATUT'] == 1) {
                                        ?>
                                    <span class="badge bg-success">Approuvé</span>
                                    <?php
                                        } elseif ($val['STATUT'] == 0) {
                                        ?>
                                    <span class="badge bg-danger">Non Approuvé</span>
                                    <?php
                                        }
                                        ?>
                                </td>
                                <?php
                                    if ($_SESSION['ROLE'] != 0) {
                                    ?>
                                <td class="fw bold text-center mx-auto mx-2">


                                    <a href="./member.php?id=<?= $val['ID'] ?>">
                                        <span class="badge bg-success ms-2">
                                            <i class="bi bi-pencil-square fa-lg "></i>
                                        </span>
                                    </a>
                                    <a href="../admin/processing/deletemember.php?id=<?= $val['ID'] ?>">
                                        <span class="badge bg-danger ms-2">
                                            <i class="bi bi-trash fa-lg "></i>
                                        </span>
                                    </a>
                                    <?php
                                            if ($val['STATUT'] == 0) {
                                            ?>
                                    <a href="../admin/processing/approved.php?id=<?= $val['ID'] ?>">
                                        <span class="badge bg-info ms-2">
                                            <i class="bi bi-check-all fa-lg "></i>
                                        </span>
                                    </a>

                                    <?php
                                            } else if ($val['ROLE'] == 0) {
                                            ?>
                                    <a href="../admin/processing/makeadmin.php?id=<?= $val['ID'] ?>">
                                        <span class="badge bg-secondary ms-2">
                                            <i class="bi bi-check-circle fa-lg "></i>
                                        </span>
                                    </a>
                                    <?php
                                            } else {
                                            ?>
                                    <a href="../admin/processing/unmakeadmin.php?id=<?= $val['ID'] ?>">
                                        <span class="badge bg-warning ms-2">
                                            <i class="bi bi-x-octagon fa-lg "></i>
                                        </span>
                                    </a>
                                    <?php
                                            }
                                            ?>


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
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 ">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Nouveau Membre</h5>
                <button type="button" class="btn-close h2 fw-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ms-3">
                <form enctype="multipart/form-data" class="row g-3 needs-validation" method="POST"
                    action="../admin/processing/addmember.php" novalidate>
                    <div class="row">

                        <div class="col-4">
                            <label for="yourEmail" class="form-label">Numéro</label>

                            <input readonly value="1" type="number" min="0" name="numero" class="form-control"
                                id="yourEmail" required>

                            <div class="invalid-feedback">Svp Entrer votre numéro!</div>
                        </div>
                        <div class="col-4">
                            <label for="yourEmail" class="form-label">Numero de téléphone</label>
                            <input type="number" min="0" name="numerotelephone" class="form-control" id="yourEmail"
                                required>
                            <div class="invalid-feedback">Svp Entrer votre numéro!</div>
                        </div>
                        <div class="col-4">
                            <label for="yourEmail" class="form-label">Lieu de Travail</label>
                            <input type="text" min="0" name="lieudetravail" class="form-control" id="yourEmail"
                                required>
                            <div class="invalid-feedback">Svp Entrer votre lieu de travail!</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="yourName" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Svp Entrer votre nom!</div>
                        </div>
                        <div class="col-4">
                            <label for="yourName" class="form-label">Postnom</label>
                            <input type="text" name="postnom" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Svp Entrer votre postnom!</div>
                        </div>
                        <div class="col-4">
                            <label for="yourName" class="form-label">Prenom</label>
                            <input type="text" name="prenom" class="form-control" id="yourName" required>
                            <div class="invalid-feedback">Svp Entrer votre prenom!</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Svp Entrer votre nom d'utilisateur.</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="yourPassword" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            <div class="invalid-feedback">Svp Entrer votre mot de passe!</div>
                        </div>
                        <div class="col-4">
                            <label for="formFile" class="form-label">Choisir Une Photo</label>
                            <input name="profileImage" class="form-control" type="file" id="formFile" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button name="save" class="btn btn-primary mt-4 fw-bold " type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top-0">

            </div>
        </div>
    </div>
</div>
<!-- End Add Member Modal -->