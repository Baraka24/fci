<?php
require("../../includes/link_db.php");

if (isset($_POST['save'])) {
    require_once("../../Class/devise.php");
    $data = new devise();
    try {
        $data->setDescription($_POST['description']);
        $data->setTaux($_POST['taux']);
        $data->inserer();
        header("location:../devises.php");
    } catch (Exception $e) {
        return $e;
    }
}
