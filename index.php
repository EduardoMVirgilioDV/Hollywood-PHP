<?php
session_start();
include("helpers/coneccion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hollywood</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/<?= $_SERVER["QUERY_STRING"] && isset($_GET["view"]) && file_exists("public/css/".trim($_GET["view"]).".css") ?  trim($_GET["view"]) : "main"?>.css">
</head>
<body>
    <?php include("includes/header.php") ?>

    <?php if (isset($_GET["action"])) { ?>
        <div class="alert alert-<?=$_GET["action"]?> fixed-top" role="alert">
            <?=$_GET["msg"]?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <?php if (isset($errors["email"])) { ?>
        <div class="alert alert-danger fixed-top" role="alert">
            <?=$errors["email"]?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    
    <?php 
        $view = $_SERVER["QUERY_STRING"] && isset($_GET["view"]) && file_exists("views/".$_GET["view"].".php") ?  "views/".$_GET["view"].".php" : "views/error.php";
        include($view);
    ?>
    <script src="public/js/jquery-3.5.1.slim.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</body>
</html>
