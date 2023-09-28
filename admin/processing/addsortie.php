<?php
require("../../includes/link_db.php");
require("../../Class/sortie.php");
require("../../Class/entree.php");
require("../../Class/devise.php");
$data = new devise();
$entree = new entree();
$sme = $entree->sum();

if (isset($_POST['save'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();




    $sortie = new sortie;
    $sms = $sortie->sum();
    $solde;
    foreach ($all as $key => $val) {
        foreach ($sme as $key => $vale) {
            foreach ($sms as $key => $vals) {
                $solde = $vale['totalentree'] - $vals['totalsortie'];
            }
        }
        if ($solde < ($_POST['montant'] * $val['taux'])) {
            echo '<script>
                    alert("Balance Insuffisante !");
                    window.location.href="../exits.php";
                </script>';
        } else {
            try {
                $sortie->setdate_sortie($_POST['date']);
                $sortie->setDescription($_POST['description']);
                $sortie->setDevise($_POST['devise']);
                $sortie->setTaux($val['taux']);
                $sortie->setMontant($_POST['montant']);
                $sortie->setObservation($_POST['observation']);
                $sortie->inserer();
                header("location:../exits.php");
            } catch (Exception $e) {
                return $e;
            }
        }
    }
}
