<?php $title = "Administration"; ?>

<?php $pageTitle = "Paiements"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/paiement.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>