<?php
    session_start();

    class bgAuth {

    public $theme;
    public $title;
    public $users;
    public $home;

    function __construct() {
        include('config.php');
        $this->title = $c['title'];
        $this->theme = $c['theme'];
        $this->users = $c['users'];
        $this->home = $c['home'];
      }

    // Methods
    function get($u, $ww, $array) {
        
        return null;
     }

    function auth($role = 'default') {
        if (isset($_POST['u']) && isset($_POST['ww'])) {
            foreach ($this->users as $key => $val) {
                if ($val['username'] == $_POST['u'] && $val['psw'] == $_POST['ww']) {
                    // secho($this->users[$key]['name']);
                    $_SESSION['roles'] = $val['roles'];
                    $_SESSION['username'] = $val['username'];
                    $_SESSION['name'] = $val['name'];
                }
            }
        }

        // foreach ($val['roles'] as $rol) {
        //     if ($rol == $role) {
        //         $_SESSION['roles'] = $this->users[$key]['roles'];
        //     }
        // }

        if (!isset($_SESSION['username'])) {
            switch ($this->theme) {
                case 'default':
                    echo('<!DOCTYPE html>
                    <html>
                      <head>
                        <title>Login | '.$this->title.'</title>
                        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
                        <style>
                          html, body {
                          display: flex;
                          justify-content: center;
                          font-family: Roboto, Arial, sans-serif;
                          font-size: 15px;
                          }
                          form {
                          border: 5px solid #f1f1f1;
                          }
                          input[type=text], input[type=password] {
                          width: 100%;
                          padding: 16px 8px;
                          margin: 8px 0;
                          display: inline-block;
                          border: 1px solid #ccc;
                          box-sizing: border-box;
                          }
                          button {
                          background-color: #8ebf42;
                          color: white;
                          padding: 14px 0;
                          margin: 10px 0;
                          border: none;
                          cursor: grabbing;
                          width: 100%;
                          }
                          h1 {
                          text-align:center;
                          fone-size:18;
                          }
                          button:hover {
                          opacity: 0.8;
                          }
                          .formcontainer {
                          text-align: left;
                          margin: 24px 50px 12px;
                          }
                          .container {
                          padding: 16px 0;
                          text-align:left;
                          }
                          span.psw {
                          float: right;
                          padding-top: 0;
                          padding-right: 15px;
                          }
                          /* Change styles for span on extra small screens */
                          @media screen and (max-width: 300px) {
                          span.psw {
                          display: block;
                          float: none;
                          }
                        </style>
                      </head>
                      <body>
                        <form action="" method="POST">
                          <h1>Login - '.$this->title.'</h1>
                          <div class="formcontainer">
                          <hr/>
                          <div class="container">
                            <label for="u"><strong>Username</strong></label>
                            <input type="text" placeholder="Enter Username" name="u" required>
                            <label for="ww"><strong>Password</strong></label>
                            <input type="password" placeholder="Enter Password" name="ww" required>
                          </div>
                          <button type="submit">Login</button>
                          <div class="container" style="background-color: #eee">
                            <label style="padding-left: 15px">
                                © '.$this->title.' '.Date('Y').'
                            </label>
                          </div>
                        </form>
                      </body>
                    </html>');
                    break;
                default:
                die('ERROR | Theme not found!');
            }
            die();
        } else {
            $r = false;
            foreach ($_SESSION['roles'] as $rol) {
                if ($rol == $role) {
                  $r = true;
                }
            }
            if ($r == false) {
              die('<h1>403</h1>You do not have the role to access this page<hr><i>'.$_SESSION['username'].' on '.$this->title.' | <a href="'.$this->home.'">Home</a></i>');  
            } else {
              // echo('200 | Good<br>');
            }
        }
    }
        function logout() {
            session_destroy();
        }
        function get_name() {
          return $_SESSION['name'];
        }
        function get_username() {
          return $_SESSION['username'];
        }
        function get_roles() {
          return $_SESSION['roles'];
        }
        function get_site_title() {
          return $this->title;
        }
    }
?>
