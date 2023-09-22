<?php
require("../../includes/link_db.php");
require("../../Class/paiement.php");
require("../../Class/devise.php");
$data = new devise();
if (isset($_POST['save'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();

    $paie = new paiement;
    foreach ($all as $key => $val) {

        try {
            $paie->setDate_paiement($_POST['date']);
            $paie->setMembre($_POST['membre']);
            $paie->setCotisation($_POST['motif']);
            $paie->setMontant($_POST['montant']);
            $paie->setDevise($_POST['devise']);
            $paie->setTaux($val['taux']);
            $paie->inserer();
            header("location:../contribution.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
