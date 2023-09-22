<?php
require("../../includes/link_db.php");
require("../../Class/cotisation.php");
require("../../Class/devise.php");
$data = new devise();
if (isset($_POST['save'])) {
    $data->setDescription($_POST['devise']);
    $all = $data->afficherbydescription();

    $motif = new cotisation;
    foreach ($all as $key => $val) {

        try {
            $motif->setDesciption($_POST['description']);
            $motif->setDevise($val['id']);
            $motif->setMontant($_POST['montant']);
            $motif->setTaux($val['taux']);
            $motif->inserer();
            header("location:../motif.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
