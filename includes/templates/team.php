<h2 class=""><?php echo lang('teamM');?></h2>
<hr>
<div class="container">


    <button type="button" class="btn btn-primary btn-lg">
        <?php echo lang('addUserB');?>
    </button>

    <!-- add user page -->
    <div class="container edit-profile">
        <h3 class="text-center"><?php echo lang('addUserB');?></h3>
        <form class="row g-3" action="?team=insert" method="POST">
            <!-- Start First Name Field -->
            <div class="col-sm-4">
                <label for="" class="control-lable"><?php echo lang('fName');?></label>
                <div class="col-sm-8">
                    <input type="text" name="fName" class="form-control" required="required">
                </div>
                <div class="valid-feedback">
                </div>
            </div>
            <!-- End First Name Field -->
            <!-- Start Last Name Field -->
            <div class="col-sm-4">
                <label for="" class="control-lable"><?php echo lang('lName');?></label>
                <div class="col-sm-8">
                    <input type="text" name="lName" class="form-control" required="required">
                </div>
                <div class="valid-feedback">
                </div>
            </div>
            <!-- End Last Name Field -->

            <!-- Start User Role Field -->
            <div class="col-md-4">
                <label for="" class="control-label"><?php echo lang('uRole');?></label>
                <div class="col-sm-8">
                    <select class="form-select" name="uRole" id="">
                        <option value="1">admin</option>
                        <option value="2">member</option>
                        <option value="3">client</option>
                    </select>
                </div>
            </div>
            <!-- End User Role Field -->

            <!-- Start User address Field -->
            <div class="col-md-4">
                <label for="" class="control-label"><?php echo lang('uCountry');?></label>
                <div class="col-sm-8">
                    <select class="form-select" name="uCountry" id="" required="required">
                    <option selected="">Sudan</option>
                    <option>Egypt</option>
                    <option>Sudia Arabia</option>
                    </select>
                    <label for="" class="control-lable">status</label>
                    <div class="input-group">
                        <select name="status" id="" class="form-select">
                            <option value="active" >active</option>
                            <option value="closed">closed</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- End User address Field -->

            <!-- Start Username Field -->
            <div class="col-sm-3">
                <label for="" class="col-sm-2 control-lable"><?php echo lang('userName');?></label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" name="userName" class="form-control" required="required">
                    <div class="valid-feedback">
                    </div>
                </div>
            </div>
            <!-- End Username Field -->
            <!-- Start Email Field -->
            <div class="col-sm-4">
                <label for="" class="control-lable" autocomplete="off"><?php echo lang('email');?></label>
                <div>
                    <input type="email" name="email" class="form-control" required="required">
                </div>
            </div>
            <!-- End Email Field -->
            <!-- Start Password Field -->
            <div class="col-sm-5">
                <label for="" class="control-lable"><?php echo lang('password');?></label>
                <div class="col-sm-8">
                    <input type="password" name="newpassword" class="form-control" autocomplete="new-password" required="required">
                </div>
            </div>
            <!-- End Password Field -->
            
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked="">
                <label class="form-check-label" for="flexSwitchCheckChecked"><?php echo lang('activeU');?></label>
            </div>
            
            <!-- start submit input -->
            <div class="col-sm-3">
                <div class="col-sm-8">
                    <input type="submit" value="<?php echo lang('add');?>" class="btn btn-primary">
                </div>
            </div>
            <!-- end submit input -->

            
        </form>
    </div>


    <!-- team list start -->
    <div class="table-responsive">
        <table class="table  table-striped">
            <thead>
                <tr>
                    <th class="table-success" scope="col">#Id</th>
                    <th class="table-success" scope="col">Name</th>
                    <th class="table-success" scope="col">Email</th>
                    <th class="table-success" scope="col">User Name</th>
                    <th class="table-success" scope="col">Joined On</th>
                    <th class="table-light">options</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($rows as $row) {
                    echo '  <tr>
                                <td>'. $row['user_id'] .'</td>
                                <td>'. $row['first_name'] . ' ' . $row['last_name'] .'</td>
                                <td>'. $row['email'] .'</td>
                                <td>'. $row['user_name'] .'</td>
                                <td>'. $row['join_date'] .'</td>
                                <td>
                                    <a href="?do=editUser&userId='. $row['user_id'] .'" class="btn  btn-outline-success"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="?do=deleteUser&userId='.$row['user_id'].'" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>' ;
                                    echo ( $row['reg_status'] == 0 ) ? ' <a href="?do=activateUser&userId='. $row['user_id'] .'" class="btn btn-outline-primary"><i class="fas fa-check"></i></a>' :false;
                                echo '</td>
                            </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- team list end -->
    

</div>
<!-- End team page -->