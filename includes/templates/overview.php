
    <div class="contanier">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('allTeam');?>
                    </span>
                    <span class="icon"><i class="fas fa-users"></i>
                        <?php echo $querys->countColumn('user', 'user_id'); ?>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('allCissue');?>
                    </span>
                    <span class="icon"><i class="fas fa-lock"></i>
                        <?php echo $querys->countColumnHas('todo', 'todo_status' ,'\'closed\''); ?>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('projectsN');?>
                    </span>
                    <span class="icon"><i class="fas fa-project-diagram"></i>
                        <?php echo $querys->countColumn('project', 'project_id'); ?>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('clientN');?>
                    </span>
                    <span class="icon"><i class="fas fa-user-tie"></i>
                        <?php echo $querys->countColumnHas('user', 'user_role_id' ,3); ?>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('allOissue');?>
                    </span>
                    <span class="icon"><i class="fas fa-lock-open"></i>
                        <?php echo $querys->countColumnHas('todo', 'todo_status' ,'\'open\''); ?>
                    </span>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-box">
                    <span class="title-card">
                        <?php echo lang('pending');?>
                    </span>
                    <span class="icon"><i class="fas fa-bug"></i><a href="?do=pending">
                        <?php echo $querys->countColumnHas('user', 'reg_status' ,0); ?>
                    </a></span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="card-header">latest project</div>
                    <div class="card-body">test</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="card-header">project progress</div>
                    <div class="card-body">
                        <div class="progress">
                            <?php echo lang('allProjectsP');?>
                            <div class="progress-bar bg-danger w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="panel panel-default">
                    <div class="card-header">project</div>
                    <div class="card-body">        
                        <div class="card projects-stage">
                        <?php
                            $phase['design']            = $querys->countColumnHas('project', 'project_phase' ,'\'design\''); 
                            $phase['testing']           = $querys->countColumnHas('project', 'project_phase' ,'\'testing\''); 
                            $phase['planning']          = $querys->countColumnHas('project', 'project_phase' ,'\'planning\''); 
                            $phase['analysis']          = $querys->countColumnHas('project', 'project_phase' ,'\'analysis\''); 
                            $phase['maintenance']       = $querys->countColumnHas('project', 'project_phase' ,'\'maintenance\''); 
                            $phase['implementation']    = $querys->countColumnHas('project', 'project_phase' ,'\'implementation\''); 
                            file_put_contents('includes/data/phase.json',json_encode($phase));
                        ?>
                            <canvas id="projectsStage"></canvas>
                        </div>
                        <div class="card porjects-status">
                        <?php
                            $status['open'][]             = $querys->countColumnHas('todo', 'todo_status' ,'\'open\' AND todo_priority = \'high\''); 
                            $status['open'][]             = $querys->countColumnHas('todo', 'todo_status' ,'\'open\' AND todo_priority = \'normal\''); 
                            $status['open'][]             = $querys->countColumnHas('todo', 'todo_status' ,'\'open\' AND todo_priority = \'low\''); 
                            $status['inProgress'][]       = $querys->countColumnHas('todo', 'todo_status' ,'\'in progress\' AND todo_priority = \'high\''); 
                            $status['inProgress'][]       = $querys->countColumnHas('todo', 'todo_status' ,'\'in progress\' AND todo_priority = \'normal\''); 
                            $status['inProgress'][]       = $querys->countColumnHas('todo', 'todo_status' ,'\'in progress\' AND todo_priority = \'low\''); 
                            $status['design'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'design\' AND todo_priority = \'high\''); 
                            $status['design'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'design\' AND todo_priority = \'normal\''); 
                            $status['design'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'design\' AND todo_priority = \'low\''); 
                            $status['testing'][]          = $querys->countColumnHas('todo', 'todo_status' ,'\'testing\' AND todo_priority = \'high\''); 
                            $status['testing'][]          = $querys->countColumnHas('todo', 'todo_status' ,'\'testing\' AND todo_priority = \'normal\''); 
                            $status['testing'][]          = $querys->countColumnHas('todo', 'todo_status' ,'\'testing\' AND todo_priority = \'low\''); 
                            $status['reopen'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'reopen\' AND todo_priority = \'high\''); 
                            $status['reopen'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'reopen\' AND todo_priority = \'normal\''); 
                            $status['reopen'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'reopen\' AND todo_priority = \'low\''); 
                            $status['closed'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'closed\' AND todo_priority = \'high\''); 
                            $status['closed'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'closed\' AND todo_priority = \'normal\''); 
                            $status['closed'][]           = $querys->countColumnHas('todo', 'todo_status' ,'\'closed\' AND todo_priority = \'low\''); 
                            file_put_contents('includes/data/status.json',json_encode($status));
                        ?>
                            <canvas id="porjectsStatus"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contanier">
        <table class="table table-responsive project-list col-lg-6">
            <thead>
            
                <th>fdfhds</th>
                <th>fdfhds</th>
                <th>fdfhds</th>
            
            </thead>
            <tbody>
            <tr>
                <td>hbjn</td>
                <td>ghbj</td>
                <td>vghbj</td>
            </tr>
            </tbody>
        </table>
    </div>

