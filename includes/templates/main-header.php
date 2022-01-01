<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $css?>all.min.css">
        <link rel="stylesheet" href="<?php echo $css?>bootstrap.min.css">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $css?>style.css">
        <title><?php getTitle()?></title>
    </head>
    <body>
        <header>
            <!-- row one start -->
            <div class="contanier row">
                <nav class="navbar navbar-expand navbar-dark" aria-label="Second navbar example">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><span class="eas">Eas</span><span class="mag">Mag</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <form>
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </form>