<?php
session_start();
if (isset($_SESSION['email'])) {
    header('Location: home.php?overview');
}
$Nav        ='';
$noSide        ='';
$pageTitle  ='mainT';
include 'init.php';
include $tpl . 'login.php';
echo '  </header>';
include $tpl . 'genral-home.php';
echo lang('messeage') . ' ' . lang('admin');
include $tpl . 'footer.php';