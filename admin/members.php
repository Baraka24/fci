<?php $title = "Administration"; ?>

<?php $pageTitle = "Membres"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/members.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>