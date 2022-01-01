<?php
class project {
    private $projectId,
            $projectDec,
            $projectImg,
            $projectName,
            $projectDate,
            $projectOwner,
            $projectStatus,
            $projectTotalToDo,
            $totalProjectProg,
            $projectTotalRelease,
            $projectTotalToDoProg,
            $projectTotalReleaseProg ;
    public function seyHello() {
        echo 'HELLO';
    }
    public function getAllproject() {
        // $stmt = $db->prepare("SELECT * FROM project");
        // $stmt->execute();
        // $rows = $stmt->fetchAll(); 
        echo 'HELLO';
    }
}
