<?php
require("../../includes/link_db.php");
require_once("../../Class/membre.php");
if (isset($_GET['id'])) {
    $data = new membre();
    try {
        $data->setId($_GET['id']);
        $data->supprimer();
        header("location:../members.php");
    } catch (Exception $e) {
        return $e;
    }
}
