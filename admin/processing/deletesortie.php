<?php
require("../../includes/link_db.php");
if (isset($_GET['id'])) {
    require_once("../../Class/sortie.php");
    $data = new sortie();
    try {
        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../exits.php");
    } catch (Exception $e) {
        return $e;
    }
}
