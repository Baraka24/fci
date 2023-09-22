<?php
require("../../includes/link_db.php");
if (isset($_POST['update'])) {
    require_once("../../Class/membre.php");
    $data = new membre();

    if ($_SESSION['MOT_DE_PASSE'] === $_POST['password']) {
        if ($_POST['newpassword'] === $_POST['renewpassword']) {
            try {
                $data->setId($_SESSION['ID']);
                $data->setNom_utilisateur($_POST['username']);
                $data->setMot_de_passe($_POST['newpassword']);
                $data->modifierpassword();
                $_SESSION['NOM_UTILISATEUR'] = $_POST['username'];
                $_SESSION['MOT_DE_PASSE'] = $_POST['newpassword'];
                header("location:./tempo.php");
            } catch (Exception $e) {
                return $e;
            }
        } else {
            header("location: ../users-profile.php?msg=False&action=info&info=Retapez convenablement le nouveau mot de passe");
        }
    } else {
        header("location: ../../includes/sessionclose.php?msg=False&info=Vous êtes un espion");
    }
}
