<?php
require("../../includes/link_db.php");
if (isset($_GET['id'])) {
    require_once("../../Class/devise.php");
    $data = new devise();
    try {
        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../devises.php");
    } catch (Exception $e) {
        return $e;
    }
}
