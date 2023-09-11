<?php $title = "Administration"; ?>

<?php $pageTitle = "Motifs"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/motif.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>