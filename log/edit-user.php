<?php

session_start();

// $side       = '';
$pageTitle  = 'editUser';

if (isset($_SESSION['email'])) {

    include 'init.php';

    $page = isset($_GET['page']) ? $_GET['page'] :'overview';


    // start Edit user page
    
    if ($page == 'EditU') { // Edit user page

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
                    <form class="row g-3" action="?page=UpdateU" method="POST" >
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
    elseif ($page == 'UpdateU') {  //start update page

        if ($_SERVER ['REQUEST_METHOD'] == 'POST') {

    $alert = '<div class = "alert alert-danger">';

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


            // start html display 

            // end html display 

            
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
                echo '<div class ="alert alert-success"><h3>successed changed</h3>';
                echo '<span>number of record : ' . $count .  '</span></div>';
            }


        } else {
            echo 'you can\'t Browse This Page Directly';
        }

        echo '</div>';

    } elseif ($page == 'DeleteU') { // Delete User page start

        $userid = isset($_GET['userId']) && is_numeric($_GET['userId']) ?  intval($_GET['userId']) : 0 ;

        // start query Delete User

        $stmt = $db->prepare("  SELECT
                                    *
                                FROM
                                    user
                                WHERE
                                    user_id = ?");
        $stmt->execute(array($userid));
        $count = $stmt->rowCount(); //  show the form if there id found 000


        if($count > 0) {        // end query Delete User

            $stmt = $db->prepare("DELETE FROM user WHERE user_id = :id");
            $stmt->bindParam(":id", $userid);
            $stmt->execute();
            echo '<div class ="alert alert-success"><h3>successed delete</h3>';
            echo '<span>number of record : ' . $count .  '</span></div>';
        }
        else {
            echo 'There no User with this id';
        }

    } elseif ($page == 'Edit') {
        
    }


    include $tpl . 'footer.php';

}

else {

    header('Location: index.php');
    exit();

}