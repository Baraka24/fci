<?php
require("../../includes/link_db.php");
require_once("../../Class/paiement.php");
if (isset($_GET['id'])) {
    $data = new paiement();
    try {

        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../contribution.php");
    } catch (Exception $e) {
        return $e;
    }
}
