<?php $title = "Administration"; ?>

<?php $pageTitle = "Paiements"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/contribution.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>