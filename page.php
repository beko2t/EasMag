<?php

$id = isset($_GET['id']) ? $_GET['id'] :'Manage';

//if the page is main page

if ($id == 'Manage') {
    echo 'welcome you are in dashboard page';
    echo '<a style= "backgraound-color : #ccc;" href="?id=add-project">project page</a>';
} elseif ($id == 'add-project') {
    echo 'welcome you are in add project page';
} else {
    echo '404';
}