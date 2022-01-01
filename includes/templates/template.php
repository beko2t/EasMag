<?php

session_start();

// $noSide       = '';

$pageTitle  = 'dashboard';

if (isset($_SESSION['email'])) {
    
    include 'init.php';
    
    $querys = new qdb();
    
echo '    <!-- Start team page -->
<div class="nav-part nav nav-tabs" id="nav-tab" role="tablist">
    <a class="text-decoration-none" href="?dashboard"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> '. lang('dashboard').'</button></a>
    <a class="text-decoration-none" href="?calender"><button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">'. lang('calender') .'</button></a>
</div>
<main class="main bg-light"> ';



echo '</main>
    <!-- end team page --> ';


    include $tpl . 'footer.php';
}   // end session check brakets

else { // if there no session
    header('Location: index.php');
    exit();
}
?>