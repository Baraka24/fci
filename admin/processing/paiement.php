<?php
require("../../includes/link_db.php");
require("../../Class/paiement.php");
require("../../Class/devise.php");
require("../../Class/cotisation.php");
$data = new devise();
if (isset($_POST['save'])) {

    $data->setId($_POST['devise']);
    $all = $data->afficherbyid();

    $paie = new paiement;
    $paie->setMembre($_POST['membre']);
    $paid = $paie->paid();

    $motifm = new cotisation();
    $motifm->setId($_POST['motif']);
    $amount = $motifm->afficherbyid();
    $reste;



    foreach ($all as $key => $val) {
        foreach ($paid as $key => $vale) {

            foreach ($amount as $key => $valm) {
                $reste = $valm['MONTANT'] - $vale['paid'];
                if (($_POST['montant'] * $val['taux']) > $valm['MONTANT']) {
                    echo '<script>
                    alert("Montant est Superieur au Montant Motif");
                    window.location.href="../contribution.php";
                </script>';
                } else {
                    if ($reste <= 0) {
                        echo '<script>
                    alert("Aucune dette à votre compte");
                    window.location.href="../contribution.php";
                </script>';
                    } elseif ($reste < ($_POST['montant'] * $val['taux'])) {
                        echo '<script>
                    alert("Montant Superieur au Montant à Payer");
                    window.location.href="../contribution.php";
                </script>';
                    } elseif (($_POST['montant'] * $val['taux']) <= $reste) {

                        try {
                            $paie->setDate_paiement($_POST['date']);
                            $paie->setMembre($_POST['membre']);
                            $paie->setCotisation($_POST['motif']);
                            $paie->setMontant($_POST['montant']);
                            $paie->setDevise($_POST['devise']);
                            $paie->setTaux($val['taux']);
                            $paie->inserer();
                            header("location:../contribution.php");
                        } catch (Exception $e) {
                            return $e;
                        }
                    }
                }
            }
        }
    }
}
