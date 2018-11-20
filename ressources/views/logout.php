<?php
session_start();
$_SESSION['auth'] = null;
$_SESSION = [];
session_unset();
session_destroy();

//var_dump($_SESSION['auth']);die();


header("location:../../public/admin.php?p=login");