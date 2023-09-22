<?php $title = "Administration"; ?>

<?php $pageTitle = "Motif"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/upmotif.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>