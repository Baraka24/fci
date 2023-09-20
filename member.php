<?php $title = "Membre"; ?>

<?php $pageTitle = "Paiements"; ?>

<?php ob_start(); ?>

<?php require_once 'admin/includes/contribution.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require('templates/memberLayout.php') ?>