<?php
class qdb {

    function selectAllFromTable($table ) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM $table ");
        $stmt->execute();
        return $stmt->fetchAll(); 
    }

    function countColumn($table , $col ) {
        global $db;
        $stmt = $db->prepare("SELECT COUNT($col) FROM $table ");
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }

    function countColumnHas($table , $col , $has) {
        global $db;
        $stmt = $db->prepare("SELECT COUNT($col) FROM $table WHERE $col = $has ");
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }
    
    
    function deleteSelected($table , $byCol , $id ) {
        global $db;
        $rowId = isset($_GET[$id]) && is_numeric($_GET[$id]) ?  intval($_GET[$id]) : 0 ;

        // start query Delete project
        $stmt = $db->prepare("  SELECT * FROM $table WHERE $byCol = ?");
        $stmt->execute(array($rowId));
        $count = $stmt->rowCount(); //  show the form if there id found 000
        
        
        if($count > 0) {        // end query Delete project
            
            $stmt = $db->prepare("DELETE FROM $table WHERE $byCol = :id");
            $stmt->bindParam(":id", $rowId);
            $stmt->execute();
            $Msg = '<div class ="alert alert-success"><h3>successed delete</h3>
            <span>number of record : ' . $count .  '</span></div>';
            redirectMsg($Msg ,'back');
        }
        else {

            $eMsg = 'There no User with this id';
            redirectMsg($eMsg,'bk');
        }

    }

    function selectAllWhere( $id , $table , $col) {
        global $db;
        $stmt = $db->prepare("  SELECT * FROM $table WHERE $col = ?");
        $stmt->execute(array($id));
        
        $result = [$stmt->rowCount(),$stmt ->fetch()]; 
        
        return $result;
    }
    function activateUser( $id ) {
        global $db;
        $userId = isset($_GET[$id]) && is_numeric($_GET[$id]) ?  intval($_GET[$id]) : 0 ;

        $stmt = $db->prepare("  SELECT * FROM user WHERE user_id = ?");
        $stmt->execute(array($userId));
        $count = $stmt->rowCount(); //  show the form if there id found 000
        
        if($count > 0) {
            
            $stmt = $db->prepare("UPDATE user SET reg_status = 1 WHERE user_id = ?");
            $stmt->execute(array($userId));
            echo '<div class ="alert alert-success"><h3>activated successfuly</h3>';
            echo '<span>number of record : ' . $count .  '</span></div>';
        }
        else {

            $eMsg = 'There no User with this id';
            redirectMsg($eMsg,'bk');
        }

    }


    function selectAllFromTableBy($table,$by,$is) {
        global $db;
        $stmt = $db->prepare("SELECT * FROM $table WHERE $by = $is");
        $stmt->execute();
        return $stmt->fetchAll(); 
    }

    function insertAllProject(){
        $update = array( 
            'pName' => $_POST['projectName'],
            'pDes' => $_POST['projectDes'],
            'pStatus' => $_POST['status'],
            'oName' => $_POST['OwnerN'],
            'pPhase' => $_POST['phase']) ;
        global $db;
        $stmt = $db->prepare(" INSERT INTO 
                                    project( project_name, project_describ, project_status, project_owner_name , project_phase , project_created_date)
                                VALUES
                                    ( :pName , :pDes ,:pStatus , :oName , :pPhase ,now() )");
        $stmt->execute($update);
        return $stmt->rowCount();
    }

    function insertAllUser(){
        
        $update = array(
            'email' =>      $_POST['email'],
            'uname' =>      $_POST['userName'],
            'lname' =>      $_POST['lName'],
            'fname' =>      $_POST['fName'],
            'pass'  =>      sha1($_POST['newpassword'])) ;
        global $db;
        $stmt = $db->prepare(" INSERT INTO
                                        user(email,user_name,last_name,first_name,password,join_date,reg_status) 
                                    VALUES
                                        ( :email,:uname, :lname, :fname, :pass ,now() , 1 )");
        $stmt->execute($update);
        return $stmt->rowCount();
    }

    function checkDuplicate($select ,$table ,$value) {
        global $db;
        $stmt = $db ->  prepare("SELECT $select FROM $table WHERE $select =?");
        $stmt ->execute(array($value));
        return $stmt->rowCount();
    }

}