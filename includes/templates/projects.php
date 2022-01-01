<?php
// start project table query 

$projectsRows = new qdb();
$rows = $projectsRows -> selectAllFromTable('project');

// end project table query 
?>
<h2 class=""><?php echo lang('projectsM');?></h2>
<hr>
<div class="container">

    <div class="edit-profile onclick">
        <h3 class="text-center"><?php echo lang('addProjectB');?></h3>
        <form class="row g-3" action="?do=insertProject" method="POST">
            <!-- Start Project Name Field -->
            <div class="col-md-6 col-sm-6">
                <label for="" class="control-lable"><?php echo lang('projectName');?></label>
                <div class="">
                    <input type="text" name="projectName" class="form-control" required="required">
                </div>
            </div>
            <!-- End Project Name Field -->
            <!-- Start project Describ Field -->
            <div class="col-md-6 col-sm-6">
                <label for="" class="control-lable"><?php echo lang('projectDes');?></label>
                <div class="">
                    <input type="text" name="projectDes" class="form-control">
                </div>
            </div>
            <!-- End project Describ Field -->
            <!-- Start Status Field -->
            <div class="col-md-3 col-sm-6">
                <label for="" class="control-lable">status</label>
                <div class="input-group">
                    <select name="status" id="" class="form-select">
                        <option value="active" >active</option>
                        <option value="closed">closed</option>
                    </select>
                </div>
            </div>
            <!-- End Status Field -->
            <!-- Start phase Field -->
            <div class="col-md-3 col-sm-6">
                <label for="" class="col-sm-2 control-lable">phase</label>
                <div class="input-group">
                    <select name="phase" id="" class="form-select">
                        <option value="planning">planning</option>
                        <option value="analysis">analysis</option>
                        <option value="design">design</option>
                        <option value="implementation">implementation</option>
                        <option value="testing">testing</option>
                        <option value="maintenance">maintenance</option>
                    </select>
                </div>
            </div>
            <!-- End phase Field -->
            <!-- Start Owner Name Field -->
            <div class="col-md-6 col-sm-6">
                <label for="" class="control-lable" autocomplete="off"><?php echo lang('OwnerN');?></label>
                <div>
                    <input type="text" name="OwnerN" class="form-control">
                </div>
            </div>
            <!-- End Owner Name Field -->
            <!-- start submit input -->
            <div class="col-md-3">
                <div class="">
                    <input type="submit" value="add" class="btn btn-primary">
                </div>
            </div>
            <!-- end submit input -->
            
        </form>
    </div>
    
    <button type="button" class="btn btn-primary btn-lg">
        <?php echo lang('addProjectB');?>
    </button>
    <!-- start projects table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <!-- start head table -->
            <thead>
                <?php
            $projectHader = array(
                lang('projectN'),
                lang('projectName'),
                lang('projectProg'),
                lang('projectDes'),
                lang('projectDate'),
                lang('projectStatus'),
                lang('projectOwnerN')
            );
            foreach($projectHader as $i)
            {
                echo '<th class="table-success">'. $i . '</th>';
            }
            ?>
            <th class="table-light"></th>
            </thead>
            <!-- end head table -->


            <!-- start body table -->

            <tbody>
                    <?php
                    foreach($rows as $row) {
                        echo '  <tr>
                                    <td>'. $row['project_id'] .'</td>
                                    <td><a href="issues.php?project='.$row['project_id'].'">'. $row['project_name'] .'</a></td>
                                    <td>'. $row['project_progress'] .'</td>
                                    <td>'. $row['project_describ'] .'</td>
                                    <td>'. $row['project_created_date'] .'</td>
                                    <td>'. $row['project_status'] .'</td>
                                    <td>'. $row['project_owner_name'] .'</td>
                                    <td>
                                    <a href="?do=editProject&projectId='.$row['project_id'].'" class="btn  btn-outline-success"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="?do=deleteProject&projectId='.$row['project_id'].'" class="btn btn-outline-danger confirm"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>';
                    }
                    ?>
                </tbody>

            <!-- end body table -->

        </table>
    </div>
</div>