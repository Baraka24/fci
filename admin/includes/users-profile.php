<?php
require_once("../includes/link_db.php");
require_once("../Class/membre.php");
$data = new membre();
$all = $data->afficher();
$last = $data->lastnumber();
?>
<div class="col-xl-4">

    <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="../assets/img/<?php echo $_SESSION['PROFILE'] ?>" style="height: 100px; width:100px;" alt="Profile" class="rounded-circle">
            <h4 class="text-center"></h4>
            <?php echo $_SESSION['NOM'] . " " . $_SESSION['POSTNOM'] . " " . $_SESSION['PRENOM'] ?></h4>
            <h6 class="fw-bold ">
                <?php
                if ($_SESSION['ROLE'] == 1) {
                ?>
                    <?php echo "Administrateur" ?>
                <?php
                } elseif ($_SESSION['ROLE'] == 0) {
                ?>
                    <?php echo "Membre" ?>
                <?php
                }
                ?>

            </h6>
            <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
            <?php
            if (isset($_GET['msg']) == 'True') { ?>

                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        <?php
                        if (isset($_GET['info'])) {
                            echo $_GET['info'];
                        }

                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            <?php
            } else if (isset($_GET['msg']) == "False") {
            ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        <?php
                        if (isset($_GET['info'])) {
                            echo $_GET['info'];
                        }

                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

</div>

<div class="col-xl-8">

    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Vue</button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier
                        Profile</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Modifier Mot
                        de Passe</button>
                </li>

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                    <h5 class="card-title">Details Profile</h5>

                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label fw-bold ">Noms</div>
                        <div class="col-lg-9 col-md-8">
                            <?= $_SESSION['NOM'] . " " . $_SESSION['POSTNOM'] . " " . $_SESSION['PRENOM'] ?></div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-4 label fw-bold">Téléphone</div>
                        <div class="col-lg-9 col-md-8"><?= $_SESSION['NUMERO_DE_TELEPHONE'] ?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-md-4 label fw-bold">Lieu de travail</div>
                        <div class="col-lg-9 col-md-8"><?= $_SESSION['LIEU_DE_TRAVAIL'] ?></div>
                    </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form enctype="multipart/form-data" method="POST" action="../admin/processing/updateprofile.php">
                        <input type="hidden" name="id" value="<?= $_SESSION['ID'] ?>" />
                        <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                Image</label>
                            <div class="col-md-8 col-lg-9">
                                <div class="col-4">
                                    <input accept="image/*" value="<?php echo $_SESSION['PROFILE'] ?>" type="file" value="defaulprofile.png" name="profileImage" class="form-control" id="yourName">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label fw-bold">Nom</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="nom" type="text" class="form-control" id="fullName" value="<?= $_SESSION['NOM'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label fw-bold">Post Nom</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="postnom" type="text" class="form-control" id="fullName" value="<?= $_SESSION['POSTNOM'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label fw-bold">Prénom</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="prenom" type="text" class="form-control" id="fullName" value="<?= $_SESSION['PRENOM'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label fw-bold">Téléphone</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="numerotelephone" type="text" class="form-control" id="fullName" value="<?= $_SESSION['NUMERO_DE_TELEPHONE'] ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label fw-bold">Lieu de
                                Travail</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="lieudetravail" type="text" class="form-control" id="fullName" value="<?= $_SESSION['LIEU_DE_TRAVAIL'] ?>">
                            </div>
                        </div>
                        <div class="text-center">
                            <button name="update" type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form method="POST" action="../admin/processing/updatepassword.php">
                        <div class="row mb-3">
                            <label for="currentPassword" class="col-md-6 col-lg-5 col-form-label">Nom
                                d'Utilisateur</label>
                            <div class="col-md-6 col-lg-7">
                                <input value="<?= $_SESSION["NOM_UTILISATEUR"] ?>" name="username" type="text" class="form-control" id="currentPassword">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="currentPassword" class="col-md-6 col-lg-5 col-form-label">Mot de Passe
                                Courant</label>
                            <div class="col-md-6 col-lg-7">
                                <input name="password" type="password" class="form-control" id="currentPassword">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="newPassword" class="col-md-6 col-lg-5 col-form-label">Nouveau Mot de
                                Passe</label>
                            <div class="col-md-6 col-lg-7">
                                <input name="newpassword" type="password" class="form-control" id="newPassword">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="renewPassword" class="col-md-6 col-lg-5 col-form-label">Confirmer le</label>
                            <div class="col-md-6 col-lg-7">
                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                            </div>
                        </div>

                        <div class="text-center">
                            <button name="update" type="submit" class="btn btn-success">Modifier</button>
                        </div>
                    </form><!-- End Change Password Form -->

                </div>

            </div><!-- End Bordered Tabs -->

        </div>
    </div>

</div>