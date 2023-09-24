<?php
session_start();
session_destroy();
if (isset($_GET['msg'])) {
    header('location:../index.php?msg=False&info=Mot de Passe Incorrect');
} else {
    header('location:../index.php');
}
