<?php $title = "Administration"; ?>

<?php $pageTitle = "Entrée"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/upentree.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>