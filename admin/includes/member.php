<?php
require_once("../includes/link_db.php");
require_once("../Class/membre.php");
$data = new membre();
$id = $_GET['id'];
$data->setId($id);
$all = $data->afficherbyid();
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
                    <h5 class="card-title mb-4">Membre <span>| Modification</span></h5>

                    <form class="row g-3 ms-2 needs-validation" method="POST"
                        action="../admin/processing/updatemember.php" novalidate>
                        <?php
                        foreach ($all as $key => $val) {
                        ?>
                        <input type="hidden" name="id" value="<?= $val['ID'] ?>" />
                        <div class="row">
                            <div class="col-md-4">
                                <label for="yourEmail" class="form-label">Numéro</label>
                                <input value="<?= $val['NUMERO'] ?>" type="number" min="0" name="numero"
                                    class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Svp Entrer votre numéro!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="yourEmail" class="form-label">Numero de téléphone</label>
                                <input value="<?= $val['NUMERO_DE_TELEPHONE'] ?>" type="number" min="0"
                                    name="numerotelephone" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Svp Entrer votre numéro!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="yourEmail" class="form-label">Lieu de Travail</label>
                                <input value="<?= $val['LIEU_DE_TRAVAIL'] ?>" type="text" min="0" name="lieudetravail"
                                    class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">Svp Entrer votre lieu de travail!</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="yourName" class="form-label">Nom</label>
                                <input value="<?= $val['NOM'] ?>" type="text" name="nom" class="form-control"
                                    id="yourName" required>
                                <div class="invalid-feedback">Svp Entrer votre nom!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="yourName" class="form-label">Postnom</label>
                                <input value="<?= $val['POSTNOM'] ?>" type="text" name="postnom" class="form-control"
                                    id="yourName" required>
                                <div class="invalid-feedback">Svp Entrer votre postnom!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="yourName" class="form-label">Prenom</label>
                                <input value="<?= $val['PRENOM'] ?>" type="text" name="prenom" class="form-control"
                                    id="yourName" required>
                                <div class="invalid-feedback">Svp Entrer votre prenom!</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="yourUsername" class="form-label">Nom d'utilisateur</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input value="<?= $val['NOM_UTILISATEUR'] ?>" type="text" name="username"
                                        class="form-control" id="yourUsername" required>
                                    <div class="invalid-feedback">Svp Entrer votre nom d'utilisateur.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="yourPassword" class="form-label">Mot de passe</label>
                                <input value="<?= $val['MOT_DE_PASSE'] ?>" type="password" name="password"
                                    class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">Svp Entrer votre mot de passe!</div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button name="modifier" class="btn btn-success mt-4 fw-bold "
                                type="submit">Enregistrer</button>
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