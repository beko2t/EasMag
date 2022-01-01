<?php
    // function page title 
    function getTitle() {
        global $pageTitle;
        echo isset($pageTitle) ? lang($pageTitle) : lang('defaultTitle');
    }

    // function redirectMsg to aleart error and redirect to Home page

    function redirectMsg($msg ,$url = null ,$sec = 2) {

        if($url === null){
            $url = 'index.php';
        }
        elseif($url === 'back' || $url === 'bk') {
            $url = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
        }
        else {
            $url = $url; 
        }


        echo $msg;
        header("refresh:$sec;url=$url");
        exit();
    }
    // function checkDuplicate($select ,$table ,$value) {
    //     global $db;
    //     $statement = $db ->  prepare("SELECT $select FROM $table WHERE $select =?");
    //     $statement ->execute(array($value));
    //     $count = $statement -> rowCount();
    //     return $count;
    // }

    function loadAllClasses() {
        spl_autoload_register( function ($class) {
            require 'includes/classes/class.' . $class . '.php';
        });

    }
    loadAllClasses();