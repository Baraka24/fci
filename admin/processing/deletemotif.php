<?php
require("../../includes/link_db.php");
if (isset($_GET['id'])) {
    require_once("../../Class/cotisation.php");
    $data = new cotisation();
    try {
        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../motif.php");
    } catch (Exception $e) {
        return $e;
    }
}
