<?php
require("../../includes/link_db.php");
require("../../Class/paiement.php");
require("../../Class/devise.php");
$data = new devise();
if (isset($_POST['update'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();

    $paie = new paiement;
    foreach ($all as $key => $val) {
        try {
            $paie->setId($_POST['id']);
            $paie->setDate_paiement($_POST['date']);
            $paie->setCotisation($_POST['motif']);
            $paie->setDevise($_POST['devise']);
            $paie->setMontant($_POST['montant']);
            $paie->setMembre($_POST['membre']);
            $paie->setTaux($val['taux']);
            $paie->modifier();
            header("location:../contribution.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
