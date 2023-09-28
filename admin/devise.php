<?php $title = "Administration"; ?>

<?php $pageTitle = "Devise"; ?>

<?php ob_start(); ?>

<?php require_once 'includes/devise.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('../templates/adminLayout.php') ?>