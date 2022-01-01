<?php
    //Routes
    $tpl    = 'includes/templates/';
    $func   = 'includes/function/';
    $lan    = 'includes/language/';
    $clas   = 'includes/classes/';
    $img    = 'layout/images/';
    $css    = 'layout/css/';
    $js     = 'layout/js/';

    // includes
    include $lan    . 'en.php';
    // include $lan . 'ar.php';
    // include $clas   . 'project.php';
    include $func   . 'connect.php';
    include $func   . 'functions.php';
    include $tpl    . 'main-header.php';

    // includes with condtions

    isset($Nav)  ? include $tpl . 'nav.php' : include $tpl . 'tools-bar.php';

    !isset($noSide) ? include $tpl . 'sidebar.php': false;