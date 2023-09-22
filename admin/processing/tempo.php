<?php
include '../../includes/link_db.php';
$con = new Database();
$connect = $con->open();
$username = $_SESSION['NOM_UTILISATEUR'];
$password = $_SESSION['MOT_DE_PASSE'];
try {
    $stmt = $connect->prepare("SELECT * FROM `membre` where NOM_UTILISATEUR=? AND MOT_DE_PASSE=?");
    $stmt->execute(array($username, $password));
    $nbre = $stmt->rowCount();

    if ($nbre == 1) {
        $row = $stmt->fetch();

        $_SESSION['ID'] = (string)$row['ID'];
        $_SESSION["NOM"] = $row['NOM'];
        $_SESSION["POSTNOM"] = $row['POSTNOM'];
        $_SESSION["PRENOM"] = $row['PRENOM'];
        $_SESSION["PROFILE"] = $row['PROFILE'];
        $_SESSION["NUMERO"] = $row['NUMERO'];
        $_SESSION["LIEU_DE_TRAVAIL"] = $row['LIEU_DE_TRAVAIL'];
        $_SESSION["NUMERO_DE_TELEPHONE"] = $row['NUMERO_DE_TELEPHONE'];
        $_SESSION["NOM_UTILISATEUR"] = $row['NOM_UTILISATEUR'];
        $_SESSION["MOT_DE_PASSE"] = $row['MOT_DE_PASSE'];

        $_SESSION['ROLE'] = $row['ROLE'];
        header("Location:../users-profile.php");
    } else {
        header("location: ../../index.php?msg=False&info=Verifier votre username ou mot de passe");
    }
} catch (PDOException $e) {
    $erreur = $e->getMessage();
    header("location: ./../index.php?msg=False&info= $erreur");
}
