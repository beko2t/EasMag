<?php
ob_start();
session_start();

// $noSide       = '';

$pageTitle  = 'homeT';

if (isset($_SESSION['email'])) {
    
    include 'init.php';
    
    $querys = new qdb();

    $page = isset($_GET['do']) ? $_GET['do'] : 'overview';

    echo '
    
    <!-- Start team page -->
    <div class="nav-part nav nav-tabs" id="nav-tab" role="tablist">
    <a class="text-decoration-none" href="?do=overview"><button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"> '. lang('overview').'</button></a>
    <a class="text-decoration-none" href="?do=projects"><button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">'. lang('projects') .'</button></a>
    <a class="text-decoration-none" href="?do=team"><button class="nav-link active" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">' . lang('team') .'</button></a>
    </div>
    <main class="main bg-light"> ';
    $alert = '<div class = "alert alert-danger">';
    
    if( $page == 'overview') {

        // strat overview page
        
            include $tpl . 'overview.php';

        // end overview page

    } 
    
    elseif ($page == 'projects') {

        include $tpl . 'projects.php';
    }
    elseif ($page == 'insertProject') { // Insert Project page strat
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            echo '<!-- Start Insert Profile -->
                <h1 class="container edit-profile">' . lang('addProjectB') . '</h1>';
            echo '<div class="container edit-profile">';
                
            if (empty($_POST['projectName'])) {

                $Msg = $alert . 'Project Name can\'t be <strong>empty</strong></div></div>';
                        redirectMsg($Msg,'bk');
            }
            else {
                        $count = $querys -> insertAllProject();
                        $Msg = '<div class ="alert alert-success"><h3>successed changed</h3>
                        <span>number of record : ' . $count .  '</span></div>';
                    redirectMsg($Msg,'bk');
            }
        } // end check post request
        else {
                $eMsg = 'you can\'t Browse This Page';
            redirectMsg($eMsg);
        }
    }   // end Insert project page


        // start Edit project page

    elseif ($page == 'editProject') { // Edit project page

        // start query edit project

        $projectid = isset($_GET['projectId']) && is_numeric($_GET['projectId']) ?  intval($_GET['projectId']) : 0 ;

        $query = new qdb();
        
        $result = $query -> selectAllWhere($projectid ,'project','project_id'); //  show the form if there id found 000
        $count = $result[0];
        $row = $result[1]; //  show the form if there id found 000

        if($count > 0) {   // end query edit Profile ?>
            <div class="container edit-profile" style="position: fixed;">
                <h3 class="text-center"><?php echo lang('editProjectB');?></h3>
                <form class="row g-3" action="?do=updateProject" method="POST">
                    <!-- Start Project Name Field -->
                    <input type="hidden" name="projectId" value="<?php echo $projectid;?>"/>
                    <div class="col-sm-6">
                        <label for="" class="control-lable"><?php echo lang('projectName');?></label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo $row['project_name'];?>" name="projectName" class="form-control" required="required">
                        </div>
                    </div>
                    <!-- End Project Name Field -->
                    <!-- Start project Describ Field -->
                    <div class="col-sm-6">
                        <label for="" class="control-lable"><?php echo lang('projectDes');?></label>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $row['project_describ'];?>" name="projectDes" class="form-control">
                        </div>
                        <div class="valid-feedback">
                        </div>
                    </div>
                    <!-- End project Describ Field -->

                    <!-- Start Key Field -->
                    <div class="col-sm-3">
                        <label for="" class="col-sm-2 control-lable">status</label>
                        <div class="input-group">
                            <select name="status" id="" class="form-select" value = "<?php echo $row['project_status'];?>">
                                <option value="active">active</option>
                                <option value="closed">closed</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Key Field -->
                    <!-- Start Key Field -->
                    <div class="col-sm-3">
                        <label for="" class="col-sm-2 control-lable">phase</label>
                        <div class="input-group">
                            <select name="phase" id="" class="form-select" value = "<?php echo $row['project_phase'];?>">
                                <option value="planning">planning</option>
                                <option value="analysis">analysis</option>
                                <option value="design">design</option>
                                <option value="implementation">implementation</option>
                                <option value="testing">testing</option>
                                <option value="maintenance">maintenance</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Key Field -->

                    <!-- Start Owner Name Field -->
                    <div class="col-sm-4">
                        <label for="" class="control-lable" autocomplete="off" required="required"><?php echo lang('OwnerN');?></label>
                        <div>
                            <input type="text" name="OwnerN" value="<?php echo $row['project_owner_name'];?>" class="form-control">
                        </div>
                    </div>
                    <!-- End Owner Name Field -->
                    <!-- start submit input -->
                    <div class="col-sm-3">
                        <div class="col-sm-8">
                            <input type="submit" value="save" class="btn btn-primary">
                        </div>
                    </div>
                    <!-- end submit input -->
                    
                </form>
            </div>


<?php
        } 
        else{ // if no project found show not found 000
                echo 'Id Not found';
        }

    } // end of edit user page

    elseif ($page == 'updateProject') {  //start update project page

        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

            $alert = '<div class = "alert alert-danger">';
            
                echo '<!-- Start Update project -->
                    
                <h1 class="container edit-profile">Update Project</h1>';
                echo '<div class="container edit-profile">';
            
            
                    //  Get Form Variables form edit project page
            
                    $projectId      = $_POST['projectId'];
                    $projectName    = $_POST['projectName'];
                    $projectDes     = $_POST['projectDes'];
                    $projectStatus  = $_POST['status'];
                    // $Key            = $_POST['Key'];
                    $OwnerN         = $_POST['OwnerN'];
                    $projectPhase   = $_POST['phase'];
            
                    $update = array( $projectName , $projectDes , $projectStatus , $OwnerN , $projectPhase ,$projectId ) ;
            
            
                    if (!empty($projectName)) {
            
                        // update database with this info
                        $stmt = $db->prepare("  UPDATE
                                                    project
                                                SET
                                                    project_name   = ?,
                                                    project_describ  = ?,
                                                    project_status  = ?,
                                                    project_owner_name   = ?,
                                                    project_phase   = ?
                                                WHERE
                                                    project_id     = ? ");
                        $stmt->execute($update);
                        $count = $stmt->rowCount();
                        $eMsg = '<div class ="alert alert-success"><h3>successed changed</h3> <span>number of record : ' . $count .  '</span></div>';
                        redirectMsg($eMsg ,'back',2);
                    }
                } else {
                    $eMsg = '<div class ="alert alert-danger">you can\'t Browse This Page Directly</div>';
                    redirectMsg($eMsg ,'back', 2);
                    }

    }   //end update project page


    elseif ($page == 'deleteProject'){// Delete project page start

        $querys->deleteSelected('project', 'project_id', 'projectId' );


    }   //end delete project page

    elseif ($page == 'team' || $page == 'pending'){
    
    // strat team page
    $admin = 1 ; 
    $users = ($page == 'pending') ? '2 AND reg_status = 0' : 2 ;
    // start user table query 
    $rows = $querys -> selectAllFromTableBy('user','user_role_id',$users);

        include $tpl . 'team.php';
    }

    elseif ($page == 'insertUser') { 
        // Insert user page strat
        // $alert = '<div class = "alert alert-danger">';
        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
            echo '<!-- Start Insert Profile -->
                <h1 class="container edit-profile">' . lang('addUserB') . '</h1>';
            echo '<div class="container edit-profile">';
                //  Get Form Variables form edit profile page
                // start check empty felids
            $formErrors = array();
                
            empty($_POST['email'])              ? $formErrors[] = 'email can\'t be <strong>empty</strong>' : false;
            empty($_POST['userName'])           ? $formErrors[] = 'username can\'t be <strong>empty</strong>' : false;
            empty($_POST['lName'])              ? $formErrors[] = 'last name can\'t be <strong>empty</strong>' : false;
            empty($_POST['fName'])              ? $formErrors[] = 'first name can\'t be <strong>empty</strong>':false;
            empty($_POST['newpassword'])        ? $formErrors[] = 'password can\'t be <strong>empty</strong>' : false;
            (strlen($_POST['userName']) < 4)    ? $formErrors[] = 'username can\'t be less than <strong>4 characters</strong>' : false;

            foreach($formErrors as $error) {
                echo $alert . $error . '</div>';
            }

                // end check empty felids

                // check if no error then insert

            if (empty($formErrors)) {

                // check if User Exist in database

                $count = $querys -> checkDuplicate("user_name","user",$_POST['userName']);

                if ($count == 1) {
                    $eMsg = '<div class ="alert alert-danger">change user name is exist already</div>';
                    redirectMsg($eMsg ,'back');
                }
                else{
                    // insert database with this info
                    $count = $querys-> insertAllUser();
                    $Msg = '<div class ="alert alert-success"><h3>successed changed</h3>
                    <span>number of record : ' . $count .  '</span></div>';
                    redirectMsg($Msg ,'back');
                }
            }
        }
        else {
                $eMsg ='you can\'t Browse This Page';
                redirectMsg($eMsg ,'back');
        }
    }   // Inser usert page end

        // start Edit User page

        elseif ($page == 'editUser') { // Edit User page
            $userid = isset($_GET['userId']) && is_numeric($_GET['userId']) ?  intval($_GET['userId']) : 0 ;
    
            $query = new qdb();
        
            $result = $query -> selectAllWhere($userid ,'user','user_id'); //  show the form if there id found 000
            $count = $result[0];
            $row = $result[1];
    
            // for none admin use this // if($count > 0 && $userid == $_SESSION['id']) {
    
            if($count > 0) {        // end query edit Profile ?>
    
                <!-- Start Edit Profile -->
                
                <div class="container">
                    <h1 class="container edit-profile">Personal Settings</h1>
                    <div class="container edit-profile">
                        <h2 class="text-center"><?php echo lang('editProfile');?></h2>
                        <form class="row g-3" action="?do=updateUser" method="POST" >
                            <!-- Start First Name Field -->
                            <input type="hidden" name="userid" value="<?php echo $userid;?>"/>
                            <div class="col-sm-4">
                                <label for="" class="control-lable"><?php echo lang('fName');?></label>
                                <div class="col-sm-8">
                                    <input type="text" name="fName" value="<?php echo $row['first_name'];?>" class="form-control" required="required"/>
                                </div>
                                <div class="valid-feedback">
                                </div>
                            </div>
                            <!-- End First Name Field -->
                            <!-- Start Last Name Field -->
                            <div class="col-sm-6">
                                <label for="" class="control-lable"><?php echo lang('lName');?></label>
                                <div class="col-sm-6">
                                    <input type="text" name="lName" value="<?php echo $row['last_name'];?>" class="form-control" required="required"/>
                                </div>
                                <div class="valid-feedback">
                                </div>
                            </div>
                            <!-- End Last Name Field -->
                            <!-- Start Username Field -->
                            <div class="col-sm-3">
                                <label for="" class="col-sm-2 control-lable"><?php echo lang('userName');?></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" name="userName" value="<?php echo $row['user_name'];?>" class="form-control" required="required"/>
                                    <div class="valid-feedback">
                                    </div>
                                </div>
                            </div>
                            <!-- End Username Field -->
                            <!-- Start Email Field -->
                            <div class="col-sm-4">
                                <label for="" class="control-lable" autocomplete="off" required="required"><?php echo lang('email');?></label>
                                <div>
                                    <input type="email" name="email" value="<?php echo $row['email'];?>" class="form-control"/>
                                </div>
                            </div>
                            <!-- End Email Field -->
                            <!-- Start Password Field -->
                            <div class="col-sm-5">
                                <label for="" class="control-lable"><?php echo lang('password');?></label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="oldpassword" value="<?php echo $row['password'];?>"/>
                                    <input type="password" name="newpassword" class="form-control" autocomplete="new-password"/>
                                </div>
                            </div>
                            <!-- End Password Field -->
                            <div class="col-sm-3">
                                <div class="col-sm-8">
                                    <input type="submit" value="<?php echo lang('save');?>" class="btn btn-primary"/>
                                </div>
                            </div>
                            <!-- End Password Field -->
                            
                        </form>
                    </div>
                </div>
                <!-- End Edit Profile -->
    <?php
            } else{ // if no id found show not found 000
                echo 'Id Not found';
            }
        } // end of edit user page

    elseif ($page == 'updateUser') {  //start update page

        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

        echo '<!-- Start Update Profile -->
            
        <h1 class="container edit-profile">Update Profile</h1>';
        echo '<div class="container edit-profile">';


            //  Get Form Variables form edit profile page

            $id             = $_POST['userid'];
            $fname          = $_POST['fName'];
            $lname          = $_POST['lName'];
            $email          = $_POST['email'];
            $username       = $_POST['userName'];
            $newpassword    = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

            $update = array( $email , $username , $lname , $fname , $newpassword , $id) ;

            // start check empty felids

            $formErrors = array();

            empty($fname)           ? $formErrors[] = 'first name can\'t be <strong>empty</strong>':false;
            empty($lname)           ? $formErrors[] = 'last name can\'t be <strong>empty</strong>' : false;
            empty($email)           ? $formErrors[] = 'email can\'t be <strong>empty</strong>' : false;
            (strlen($username) < 4) ? $formErrors[] = 'username can\'t be less than <strong>4 characters</strong>' : false;
            empty($username)        ? $formErrors[] = 'username can\'t be <strong>empty</strong>' : false;

            foreach($formErrors as $error) {
            echo $alert . $error . '</div>';
            }

            // end check empty felids
            
            // check if no error then update

            if (empty($formErrors)) {

                // update database with this info
                $stmt = $db->prepare("  UPDATE
                                            user
                                        SET
                                            email       = ?,
                                            user_name   = ?,
                                            last_name   = ?,
                                            first_name  = ?,
                                            password    = ?
                                        WHERE
                                            user_id     = ?
                                        LIMIT 1");
                $stmt->execute($update);
                $count = $stmt->rowCount();
                $eMsg = '<div class ="alert alert-success"><h3>successed changed</h3> <span>number of record : ' . $count .  '</span></div>';
                redirectMsg($eMsg ,'back',2);

            }


        } else {
            $eMsg = '<div class ="alert alert-danger">you can\'t Browse This Page Directly</div>';
            redirectMsg($eMsg ,'back', 2);
        }

        echo '</div>';

    }

    elseif ($page == 'deleteUser'){ //start delete user page

            $querys->deleteSelected('user', 'user_id', 'userId' );
    
    }   //end delete user page
    
    elseif ($page == 'activateUser'){ //start activate user page
        
            $querys->activateUser('userId' );
            
    }   //end activate user page


    echo '</main>
    <!-- end team page --> ';


    include $tpl . 'footer.php';
}   // end session check brakets

else { // if there no session
    header('Location: index.php');
    exit();
}
ob_end_flush();