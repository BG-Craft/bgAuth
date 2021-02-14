<?php
    $c = array(
        'title' => 'Demo',
        'theme' => 'default',
        'home' => 'index.php',

        'users' => array(
            array(
                'name' => 'Admin User',
                'username' => 'admin',
                'psw' => 'admin',
                'roles' => array('default', 'admin')
            ),
            array(
                'name' => 'BGcraft',
                'username' => 'bgcraft',
                'psw' => 'psw!',
                'roles' => array('default')
            )
        )
    );
?>
