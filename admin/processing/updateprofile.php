<?php
require("../../includes/link_db.php");
if (isset($_POST['update'])) {
    if (!empty($_FILES['profileImage']['name'])) {
        $image = $_FILES['profileImage']['name'];
        $target = "../../assets/img/" . basename($image);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);

        require_once("../../Class/membre.php");
        $data = new membre();
        echo $_POST['profileImage'];
        try {
            $data->setId($_POST['id']);
            $data->setNom($_POST['nom']);
            $data->setPostnom($_POST['postnom']);
            $data->setPrenom($_POST['prenom']);
            $data->setLieu_de_travail($_POST['lieudetravail']);
            $data->setNumero_de_telephone($_POST['numerotelephone']);
            $data->setProfile($image);
            $data->modifierbymember();
            $_SESSION['NOM_UTILISATEUR'];
            $_SESSION['MOT_DE_PASSE'];
            header("location:./tempo.php");
        } catch (Exception $e) {
            return $e;
        }
    } else {
        require_once("../../Class/membre.php");
        $data = new membre();
        echo $_POST['profileImage'];
        try {
            $data->setId($_POST['id']);
            $data->setNom($_POST['nom']);
            $data->setPostnom($_POST['postnom']);
            $data->setPrenom($_POST['prenom']);
            $data->setLieu_de_travail($_POST['lieudetravail']);
            $data->setNumero_de_telephone($_POST['numerotelephone']);
            $data->modifierbymembernoprofile();

            header("location:../../includes/sessionclose.php");
        } catch (Exception $e) {
            return $e;
        }
    }
}
