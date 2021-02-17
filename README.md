# bgAuth
A simple account login system without database

## Demo
[Open demo](https://bastothemax.nl/demo/bgAuth/)
#### User login
**username** `bgcraft`<br>
**password** `psw!`

#### Admin login
**username** `admin`<br>
**password** `admin`


## Install
`index.php`
```php
<?php
    require_once('main.bgAuth.php');

    $auth = new bgAuth();
    $auth->auth('default');
?>
Hello <b><?php echo $auth->get_name(); ?></b> on <b><?php echo $auth->get_site_title(); ?></b>!
```

## Config
`config.bgAuth.php`
```php
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
```
**title**          => `The title of your site`
**theme**          => `The theme of your site` ( `default` )
**home**           => `The homepage of your site` ( Default is `index.php`) **⚠️ Only edit this when you know what you are doing!**
**users**          => `All the users of your site`

## Themes
### default
![Theme](https://i.ibb.co/2jDPyYQ/image.png)

## Todo
- Add functions to create an user
- Add signup function
- Add more themes

## Websites or projects with **bgAuth**
*None*

## Credits
[![BG-Craft](https://avatars.githubusercontent.com/BG-Craft?size=100)](https://github.com/BG-Craft/)

## License
This code is **MIT** licensed.
