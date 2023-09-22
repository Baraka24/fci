<?php $title = "Administration"; ?>

<?php $pageTitle = "Sortie"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/upsortie.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>