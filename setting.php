<?php

session_start();

// $noSide       = '';

$pageTitle  = 'setting';

if (isset($_SESSION['email'])) {
    
    include 'init.php';
    
    $querys = new qdb();
    
echo '    <!-- Start setting page -->
<div class="nav-part nav nav-tabs" id="nav-tab" role="tablist">
    <a class="text-decoration-none" href="?setting"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> '. lang('setting').'</button></a>
</div>
<main class="main bg-light"> ';



echo '</main>
    <!-- end setting page --> ';


    include $tpl . 'footer.php';
}   // end session check brakets

else { // if there no session
    header('Location: index.php');
    exit();
}
?>