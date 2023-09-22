<?php $title = "Administration"; ?>

<?php $pageTitle = "Paiement"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/upcontribution.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>