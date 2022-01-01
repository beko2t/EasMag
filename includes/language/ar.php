<?php include 'init.php';?>
<?php
    function lang( $phrase ){
        static $lang = array(
            'admin' => 'بالمدير',
            'messeage' => 'مرحباً'
        );
        return $lang[$phrase];
    }