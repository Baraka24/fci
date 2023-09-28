<?php
require("../../includes/link_db.php");
require("../../Class/entree.php");
require("../../Class/devise.php");
$data = new devise();
if (isset($_POST['update'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();

    $entree = new entree;
    foreach ($all as $key => $val) {
        try {
            $entree->setId($_POST['id']);
            $entree->setDate_entree($_POST['date']);
            $entree->setDescription($_POST['description']);
            $entree->setDevise($_POST['devise']);
            $entree->setTaux($val['taux']);
            $entree->setMontant($_POST['montant']);
            $entree->setObservation($_POST['observation']);
            $entree->modifier();
            header("location:../entries.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
