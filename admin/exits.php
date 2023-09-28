<?php $title = "Administration"; ?>

<?php $pageTitle = "Sorties"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/exits.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>