<?php
require("../../includes/link_db.php");
require("../../Class/sortie.php");
require("../../Class/devise.php");
$data = new devise();
if (isset($_POST['save'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();

    $sortie = new sortie;
    foreach ($all as $key => $val) {
        try {
            $sortie->setdate_sortie($_POST['date']);
            $sortie->setDescription($_POST['description']);
            $sortie->setDevise($_POST['devise']);
            $sortie->setTaux($val['taux']);
            $sortie->setMontant($_POST['montant']);
            $sortie->setObservation($_POST['observation']);
            $sortie->inserer();
            header("location:../exits.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
