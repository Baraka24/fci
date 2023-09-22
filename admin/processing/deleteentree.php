<?php
require("../../includes/link_db.php");
if (isset($_GET['id'])) {
    require_once("../../Class/entree.php");
    $data = new entree();
    try {
        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../entries.php");
    } catch (Exception $e) {
        return $e;
    }
}
