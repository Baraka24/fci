<?php
require("../../includes/link_db.php");

if (isset($_POST['update'])) {
    require_once("../../Class/devise.php");
    $data = new devise();
    try {
        $data->setId($_POST['id']);
        $data->setDescription($_POST['description']);
        $data->setTaux($_POST['taux']);
        $data->setStatuts($_POST['statuts']);
        $data->modifier();
        header("location:../devises.php");
    } catch (Exception $e) {
        return $e;
    }
}
