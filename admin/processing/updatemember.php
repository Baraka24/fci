<?php
require("../../includes/link_db.php");
if (isset($_POST['modifier'])) {
    require_once("../../Class/membre.php");
    $data = new membre();
    try {
        $data->setId($_POST['id']);
        $data->setNumero($_POST['numero']);
        $data->setNom($_POST['nom']);
        $data->setPostnom($_POST['postnom']);
        $data->setPrenom($_POST['prenom']);
        $data->setAdresse($_POST['adresse']);
        $data->setLieu_de_travail($_POST['lieudetravail']);
        $data->setNumero_de_telephone($_POST['numerotelephone']);
        $data->modifierbyadmin();
        header("location:../members.php");
    } catch (Exception $e) {
        return $e;
    }
}
