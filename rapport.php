<?php
require_once('./includes/link_db.php');
require('./dompdf/autoload.inc.php');
require_once("./Class/entree.php");
require_once("./Class/sortie.php");
require_once("./Class/paiement.php");
$entree = new entree();
$sume = $entree->sum();
$sortie = new sortie();
$sums = $sortie->sum();
$tentree = new paiement();
$data;
if (isset($_POST['date_first'])) {
    $tentree->setDate_paiement($_POST['date_first']);
    $data = $tentree->rpentree();
    $sumentree = $tentree->rpsumentree();

    $sortie->setdate_sortie($_POST['date_first']);
    $dsortie = $sortie->rpsortie();
    $sumsortie = $sortie->rpsumsortie();
}





// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$a = 'Content-Type';
$b = 'text/html; charset=utf-8';
$html .= '<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html>

    <head>
        <title>raport</title>
        <meta HTTP-EQUIV=' . $a . ' CONTENT=' . $b . ' />
        <style type="text/css">
        .csAA5B9630 {
            color: #000000;
            background-color: transparent;
            border-left: #000000 1px solid;
            border-top: #000000 1px solid;
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            font-family: Times New Roman;
            font-size: 16px;
            font-weight: bold;
            font-style: normal;
            
        }

        .cs425CAA45 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top: #000000 1px solid;
            border-right: #000000 1px solid;
            border-bottom: #000000 1px solid;
            font-family: Times New Roman;
            font-size: 16px;
            font-weight: bold;
            font-style: normal;
        }

        .cs8BD51C12 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: bold;
            font-style: normal;
            padding-left: 2px;
            padding-right: 2px;
        }

        .csE9F2AA97 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 16px;
            font-weight: bold;
            font-style: normal;
            padding-left: 2px;
            padding-right: 2px;
        }

        .cs2C853136 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 19px;
            font-weight: bold;
            font-style: normal;
            padding-left: 2px;
            padding-right: 2px;
        }

        .cs1A57CD4B {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 20px;
            font-weight: bold;
            font-style: normal;
            padding-left: 2px;
            padding-right: 2px;
        }

        .cs739196BC {
            color: #5C5C5C;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Segoe UI;
            font-size: 11px;
            font-weight: normal;
            font-style: normal;
        }

        .csF7D3565D {
            height: 0px;
            width: 0px;
            overflow: hidden;
            font-size: 0px;
            line-height: 0px;
        }
        </style>
    </head>

    <body leftMargin=10 topMargin=10 rightMargin=10 bottomMargin=10 style="background-color:#FFFFFF">
        <table cellpadding="0" cellspacing="0" border="0"
            style="border-width:0px;empty-cells:show;width:614px;height:482px;position:relative;">
            <tr>
                <td style="width:0px;height:0px;"></td>
                <td style="height:0px;width:10px;"></td>
                <td style="height:0px;width:53px;"></td>
                <td style="height:0px;width:85px;"></td>
                <td style="height:0px;width:91px;"></td>
                <td style="height:0px;width:146px;"></td>
                <td style="height:0px;width:24px;"></td>
                <td style="height:0px;width:29px;"></td>
                <td style="height:0px;width:176px;"></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:23px;"></td>
                <td class="cs739196BC" colspan="6"
                    style="width:409px;height:23px;line-height:14px;text-align:center;vertical-align:middle;">
                    <nobr>
                    </nobr>
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:48px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:25px;"></td>
                <td></td>
                <td class="cs1A57CD4B" colspan="7"
                    style="width:600px;height:25px;line-height:23px;text-align:center;vertical-align:top;">
                    <nobr>REPUBLIQUE&nbsp;DEMOCRATIQUE&nbsp;DU&nbsp;CONGO</nobr>
                </td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:23px;"></td>
                <td></td>
                <td class="cs2C853136" colspan="7"
                    style="width:600px;height:23px;line-height:22px;text-align:center;vertical-align:top;">
                    <nobr>PROVINCE&nbsp;DU&nbsp;NORD-KIVU</nobr>
                </td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:18px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:22px;"></td>
                <td></td>
                <td class="csE9F2AA97" colspan="7"
                    style="width:600px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>RAPPORT&nbsp;DES&nbsp;ENTREES&nbsp;ET&nbsp;SORTIES</nobr>
                </td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:13px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:23px;"></td>
                <td></td>
                <td class="cs8BD51C12"
                    style="width:49px;height:23px;line-height:15px;text-align:center;vertical-align:middle;">
                    <nobr>DU</nobr>
                </td>
                <td class="cs8BD51C12" colspan="2"
                    style="width:172px;height:23px;line-height:15px;text-align:center;vertical-align:middle;">
                    <nobr>' . $_POST['date_first'] . '</nobr>
                </td>
                <td></td>
                <td class="cs8BD51C12" colspan="2"
                    style="width:49px;height:23px;line-height:15px;text-align:center;vertical-align:middle;">
                    <nobr></nobr>
                </td>
                <td class="cs8BD51C12"
                    style="width:172px;height:23px;line-height:15px;text-align:center;vertical-align:middle;">
                    <nobr></nobr>
                </td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:18px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>DATE</nobr>
                </td>
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>LIBELLE</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>MONTANT</nobr>
                </td>
            </tr>';
foreach ($data as $key => $val) {
    $html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['ddate'] . '</nobr>
                </td>
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['COTISATION'] . '</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['MONTANT'] . '</nobr>
                </td>
            </tr>';
}
foreach ($sumentree as $key => $val) {
    $html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="6"
                    style="width:426px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>TOTAL&nbsp;ENTREES</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>' . $val['totalentree'] . '</nobr>
                </td>
            </tr>';
}
$html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:53px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>DATE</nobr>
                </td>
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>LIBELLE</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>MONTANT</nobr>
                </td>
            </tr>';
foreach ($dsortie as $key => $val) {
    $html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['ddate'] . '</nobr>
                </td>
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['DESCRIPTION'] . '</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $val['MONTANT'] . '</nobr>
                </td>
            </tr>';
}
foreach ($sumsortie as $key => $val) {
    $html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="6"
                    style="width:426px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>TOTAL&nbsp;SORTIES</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                    <nobr>' . $val['totalsortie'] . '</nobr>
                </td>
            </tr>';
}
$html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>ENTREES</nobr>
                </td>
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>SORTIES</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>SOLDE</nobr>
                </td>
            </tr>';
foreach ($sume as $keysme => $valsume) {
    $html .= '
            <tr style="vertical-align:top;">
                <td style="width:0px;height:24px;"></td>
                <td></td>
                <td class="csAA5B9630" colspan="2"
                    style="width:136px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $valsume['totalentree'] . '</nobr>
                </td>';
    foreach ($sums as $keysms => $valsums) {
        $html .= '
                <td class="cs425CAA45" colspan="4"
                    style="width:289px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . $valsums['totalsortie'] . '</nobr>
                </td>
                <td class="cs425CAA45"
                    style="width:175px;height:22px;line-height:18px;text-align:center;vertical-align:top;">
                    <nobr>' . ($valsume['totalentree'] - $valsums['totalsortie']) . '</nobr>
                </td>
            </tr>';
    }
}

$html .= ' </table>
    </body>

</html>';
$dompdf = new Dompdf();
$option = new Options();
$option->set('chroot', realpath(''));
$dompdf = new Dompdf($option);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF

$dompdf->render();

// Output the generated PDF to Browser
ob_clean();
$dompdf->stream('FicheCPN.pdf', ['Attachment' => false]);