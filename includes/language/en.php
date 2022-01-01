<?php
    function lang( $phrase ){
        static $lang = array(
            // index words

            'admin'         => 'administrator',
            'messeage'      => 'welcome',

            // title words

            'homeT'         => 'EasMag - Welcome',
            'mainT'         => 'EasMag - Home',
            'defaultTitle'  => 'EasMag',

            // tools bar words
            'settings'      => 'genral settings',
            'profile'       => 'edit profile',
            'logout'        => 'sing out',

            // sidebar words

            'setProject'    => 'project setting',
            'board'         => 'doing board',
            'home'          => 'home',
            
            // projects manage page words
            
            'projectsM'     => 'projects manage',
            'editProjectB'  => 'edit project',
            'addProjectB'   => 'add project',
            

            // issues manage page words
            
            'issuesM'     => 'issues manage',
            'editIssueB'  => 'edit issues',
            'addIssueB'   => 'add issues',
            
            
            
            // edit team members words
            
            'activeU'       => 'accept this User',
            'teamM'         => 'team members',
            'uCountry'      => 'country',
            'uRole'         => 'user role',
            'addUserB'      => 'add user',
            
            
            // edit user words
            
            'editProfile'   => 'Edit Profile',
            'fName'         => 'First Name',
            'lName'         => 'Last Name',
            'editUser'      => 'Edit User',
            'userName'      => 'Username',
            'password'      => 'password',
            'email'         => 'email',
            'save'          => 'save',
            'add'           => 'add',
            
            // setting words


            'setting'       => 'settings',


            // issues words
            
            
            'issue'         => 'issues',

            
            // release words
            
            
            'release'      => 'releases',
            'report'       => 'report',


            // dashboard words

            'dashboard'     => 'dashboard',
            'calender'      => 'calender',



            // overview tab words


            'team'          => 'team',
            'projects'      => 'projects',
            'overview'      => 'overview',


            // overview words
            
            'allCissue'     => 'total closed issues',
            'allOissue'     => 'total opened issues',
            'allTeam'       => 'total team members',
            'projectsN'     => 'projects number',
            'allProjectsP'  => 'projects number',
            'pending'       => 'pending members',
            'projectN'      => 'project number',
            'clientN'       => 'total client',
            'allBug'        => 'bugs number',
            
            // overview project table words
            'OwnerN'        => 'owner name',
            'projectId'     => 'project id',
            'projectkey'    => 'project key',
            'projectName'   => 'project name',
            'projectDate'   => 'project date',
            'projectStatus' => 'project status',
            'projectDes'    => 'project describ',
            'projectProg'   => 'project progress',
            'projectOwnerN' => 'project owner name',
            
            

            // overview project table words
            'issueId'       => 'issue id',
            'issueName'     => 'issue title',
            'issueDate'     => 'issue date',
            'issueStatus'   => 'issue status',
            'issueDes'      => 'issue describ',
            'issueProg'     => 'issue progress',



        );
        return $lang[$phrase];
    }