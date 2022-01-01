<?php
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