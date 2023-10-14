<?php
require_once('./includes/link_db.php');
require('./dompdf/autoload.inc.php');
require_once("./Class/paiement.php");

$paie = new paiement();
$id = $_GET['id'];
$paie->setId($id);
$all = $paie->afficherallid();


// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$a = 'Content-Type';
$b = 'text/html; charset=utf-8';

$html .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html>

<head>
    <title>recu</title>
    <meta HTTP-EQUIV=' . $a . ' CONTENT=' . $b . ' />
    <style type="text/css">
        .csD3BAAD98 {
            color: #000000;
            background-color: transparent;
            border-left: #000000 2px solid;
            border-top: #000000 2px solid;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .cs777B522F {
            color: #000000;
            background-color: transparent;
            border-left: #000000 2px solid;
            border-top-style: none;
            border-right-style: none;
            border-bottom: #000000 2px solid;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .csC58AE103 {
            color: #000000;
            background-color: transparent;
            border-left: #000000 2px solid;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .csA0EB43D3 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top: #000000 2px solid;
            border-right: #000000 2px solid;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .csEC29B16F {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top: #000000 2px solid;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .cs89533CBF {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right: #000000 2px solid;
            border-bottom: #000000 2px solid;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .csF657C995 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right: #000000 2px solid;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .cs9BAD3C8E {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom: #000000 2px solid;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .cs101A94F7 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
        }

        .cs6105B8F3 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 13px;
            font-weight: normal;
            font-style: normal;
            padding-left: 2px;
        }

        .cs7FDFEC77 {
            color: #000000;
            background-color: transparent;
            border-left-style: none;
            border-top-style: none;
            border-right-style: none;
            border-bottom-style: none;
            font-family: Times New Roman;
            font-size: 16px;
            font-weight: normal;
            font-style: normal;
            text-decoration: underline;
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
    <table cellpadding="0" cellspacing="0" border="0" style="border-width:0px;empty-cells:show;width:409px;height:240px;position:relative;">
        <tr>
            <td style="width:0px;height:0px;"></td>
            <td style="height:0px;width:36px;"></td>
            <td style="height:0px;width:10px;"></td>
            <td style="height:0px;width:2px;"></td>
            <td style="height:0px;width:62px;"></td>
            <td style="height:0px;width:15px;"></td>
            <td style="height:0px;width:11px;"></td>
            <td style="height:0px;width:2px;"></td>
            <td style="height:0px;width:106px;"></td>
            <td style="height:0px;width:33px;"></td>
            <td style="height:0px;width:57px;"></td>
            <td style="height:0px;width:30px;"></td>
            <td style="height:0px;width:45px;"></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:23px;"></td>
            <td class="cs739196BC" colspan="12" style="width:409px;height:23px;line-height:14px;text-align:center;vertical-align:middle;">
                <nobr>
                    
                </nobr>
            </td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:10px;"></td>
            <td></td>
            <td class="csD3BAAD98" style="width:8px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:2px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:62px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:15px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:11px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:2px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:106px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:33px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csEC29B16F" style="width:57px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csA0EB43D3" style="width:28px;height:8px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>';
foreach ($all as $keypaie => $valpaie) {
    $html .= '
        <tr style="vertical-align:top;">
            <td style="width:0px;height:22px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs7FDFEC77" colspan="6" style="width:194px;height:22px;line-height:18px;text-align:center;vertical-align:middle;">
                <nobr>RECU&nbsp;DE&nbsp;PAIEMENT</nobr>
            </td>
            <td class="cs6105B8F3" style="width:31px;height:22px;line-height:15px;text-align:left;vertical-align:middle;">
                <nobr>N&#176;&nbsp;:</nobr>
            </td>
            <td class="cs6105B8F3" style="width:55px;height:22px;line-height:15px;text-align:left;vertical-align:middle;">
                <nobr>' . $valpaie['id'] . '</nobr>
            </td>
            <td class="csF657C995" style="width:28px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
<tr style="vertical-align:top;">
            <td style="width:0px;height:42px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:62px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:15px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:11px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:106px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:33px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:57px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csF657C995" style="width:28px;height:42px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:23px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:23px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:23px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" style="width:60px;height:23px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>Re&#231;u&nbsp;de</nobr>
            </td>
            <td class="cs6105B8F3" colspan="6" style="width:222px;height:23px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>' . $valpaie['nom'] . " " . $valpaie['postnom'] . " " . $valpaie['prenom'] . '</nobr>
            </td>
            <td class="csF657C995" style="width:28px;height:23px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:14px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:62px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:15px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:11px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:106px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:33px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:57px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csF657C995" style="width:28px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:22px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" colspan="3" style="width:86px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>Montant&nbsp;Pay&#233;&nbsp;:</nobr>
            </td>
            <td class="cs101A94F7" style="width:2px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" style="width:104px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>' . $valpaie['montant'] . " En devise d'usage" . '</nobr>
            </td>
            <td class="cs101A94F7" style="width:33px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:57px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csF657C995" style="width:28px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:12px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:62px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:15px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:11px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:106px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:33px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:57px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csF657C995" style="width:28px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:22px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" colspan="3" style="width:86px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>En&nbsp;Date&nbsp;du&nbsp;:</nobr>
            </td>
            <td class="cs101A94F7" style="width:2px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" colspan="3" style="width:194px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>' . $valpaie['DATE_PAIE'] . '</nobr>
            </td>
            <td class="csF657C995" style="width:28px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:12px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:62px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:15px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:11px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:106px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:33px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:57px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="csF657C995" style="width:28px;height:12px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:22px;"></td>
            <td></td>
            <td class="csC58AE103" style="width:8px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs101A94F7" style="width:2px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs6105B8F3" colspan="2" style="width:75px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>Per&#231;us&nbsp;par&nbsp;:</nobr>
            </td>
            <td class="cs6105B8F3" colspan="5" style="width:207px;height:22px;line-height:15px;text-align:left;vertical-align:top;">
                <nobr>' . $_SESSION['POSTNOM'] . " " . $_SESSION['PRENOM'] . '</nobr>
            </td>
            <td class="csF657C995" style="width:28px;height:22px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>
        <tr style="vertical-align:top;">
            <td style="width:0px;height:16px;"></td>
            <td></td>
            <td class="cs777B522F" style="width:8px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:2px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:62px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:15px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:11px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:2px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:106px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:33px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs9BAD3C8E" style="width:57px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td class="cs89533CBF" style="width:28px;height:14px;">
                <!--[if lte IE 7]><div class="csF7D3565D"></div><![endif]-->
            </td>
            <td></td>
        </tr>';
}
$html .= '</table>
</body>

</html>';
$dompdf = new Dompdf();
$option = new Options();
$option->set('chroot', realpath(''));
$dompdf = new Dompdf($option);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A5', 'portrait');

// Render the HTML as PDF

$dompdf->render();

// Output the generated PDF to Browser
ob_clean();
$dompdf->stream('FicheCPN.pdf', ['Attachment' => false]);