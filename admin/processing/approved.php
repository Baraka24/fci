<?php
require("../../includes/link_db.php");
if (isset($_GET['id'])) {
    require_once("../../Class/membre.php");
    $data = new membre();
    try {
        $data->setId($_GET['id']);
        $data->setStatus(1);
        $data->approved();
        header("location:../members.php");
    } catch (Exception $e) {
        return $e;
    }
}
