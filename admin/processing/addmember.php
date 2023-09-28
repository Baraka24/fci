<?php
require("../../includes/link_db.php");
if (isset($_POST['save'])) {
    if (isset($_FILES['profileImage'])) {
        $image = $_FILES['profileImage']['name'];
        $target = "../../assets/img/" . basename($image);

        move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);

        require_once("../../Class/membre.php");

        $data = new membre();
        $last = $data->lastnumber();
        foreach ($last as $key => $val) {
            try {
                $data->setNumero($val['NUMERO'] + 1);
                $data->setNom($_POST['nom']);
                $data->setPostnom($_POST['postnom']);
                $data->setPrenom($_POST['prenom']);
                $data->setLieu_de_travail($_POST['lieudetravail']);
                $data->setNumero_de_telephone($_POST['numerotelephone']);
                $data->setNom_utilisateur($_POST['username']);
                $data->setMot_de_passe("0000");
                $data->setProfile($image);
                $data->setStatus(1);
                $data->inserer();
                header("location:../members.php");
            } catch (Exception $e) {
                return $e;
            }
        }
    }
}
