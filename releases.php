<?php

session_start();

// $noSide       = '';

$pageTitle  = 'release';

if (isset($_SESSION['email'])) {
    
    include 'init.php';
    
    $querys = new qdb();
    
echo '    <!-- Start team page -->
<div class="nav-part nav nav-tabs" id="nav-tab" role="tablist">
    <a class="text-decoration-none" href="?releases"><button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> '. lang('release').'</button></a>
    <a class="text-decoration-none" href="?report"><button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">'. lang('report') .'</button></a>
</div>
<main class="main bg-light"> ';


if (isset($_GET['releases'])) {

    $page = $_GET['releases'] ;

    // releases page start

    include $clas . 'projects.php';

    if ($page == 'insert') { // Insert Project page strat

        $alert = '<div class = "alert alert-danger">';
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            echo '<!-- Start Insert Profile -->
            <h1 class="container edit-profile">' . lang('addProjectB') . '</h1>';
            echo '<div class="container edit-profile">';
            //  Get Form Variables form add Project page
    
            // start check empty felids
    
            $formErrors = array();
            
            empty($_POST['projectName'])     ? $formErrors[] = 'Project Name can\'t be <strong>empty</strong>' : false;
            empty($_POST['OwnerN'])          ? $formErrors[] = 'Owner Name can\'t be <strong>empty</strong>' : false;
    
            foreach($formErrors as $error) {
                echo $alert . $error . '</div>';
            }
        
            // end check empty felids
    
            // check if no error then insert
        
            if (empty($formErrors)) {
        
            // insert database with this info
    
                    $count = $querys -> insertAllProject();
                    echo '<div class ="alert alert-success"><h3>successed changed</h3>';
                    echo '<span>number of record : ' . $count .  '</span></div>';
            }
        } // end check post request
        else {
            $eMsg = 'you can\'t Browse This Page';
            redirectHome($eMsg);
        }
        echo '</div>';
    }   // end Insert project page


    // start Edit project page

    if ($page == 'edit') { // Edit project page

    include $tpl . 'edit-project.php';


    } // end of edit user page

elseif ($page == 'update') {  //start update project page

    include $tpl . 'update-project.php';

}   //end update project page


elseif ($page == 'delete'){// Delete project page start

    $querys->deleteSelected('project', 'project_id', 'projectId' );


}   //end delete project page



    // projects page end

}



echo '</main>
    <!-- end team page --> ';


    include $tpl . 'footer.php';
}   // end session check brakets

else { // if there no session
    header('Location: index.php');
    exit();
}
?>