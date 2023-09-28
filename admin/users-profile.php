<?php $title = "Administration"; ?>

<?php $pageTitle = "Profile"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/users-profile.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>