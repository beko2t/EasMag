<?php
$projectsRows = new qdb();
$rows = $projectsRows -> selectAllFromTable('todo');
?>

<h2 class=""><?php echo lang('issuesM');?></h2>
        <hr>
        <div class="container">

            <button type="button" class="btn btn-primary btn-lg">
                <?php echo lang('addIssueB');?>
            </button>
            
            
            <!-- start projects table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <!-- start head table -->
                    <thead>
                        <?php
                    $projectHader = array(
                        lang('issueId'),
                        lang('issueName'),
                        lang('issueDate'),
                        lang('issueStatus'),
                        lang('issueDes'),
                        lang('issueProg')
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
                                            <td>'. $row['todo_id'] .'</td>
                                            <td>'. $row['todo_describ'] .'</td>
                                            <td>'. $row['todo_start_time'] .'</td>
                                            <td>'. $row['todo_status'] .'</td>
                                            <td>'. $row['todo_describ'] .'</td>
                                            <td>'. $row['todo_progress'] .'</td>
                                            <td>
                                            <a href="?issues=edit&todoId='.$row['todo_id'].'" class="btn  btn-outline-success"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="?issues=delete&todoId='.$row['todo_id'].'" class="btn btn-outline-danger confirm"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>';
                            }
                            ?>
                        </tbody>
    
                    <!-- end body table -->
    
                </table>
            </div>
        </div>