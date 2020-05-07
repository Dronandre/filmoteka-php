<?php


require('config.php');
require('functions\login-functions.php');

// echo"<pre>";
// print_r($_SESSION);
// echo"</pre>";

if (isset($_POST['enter'])) {
    $userName = 'admin';
    $userPassword = '123456';

    if ($_POST['login'] ==  $userName) {
        if($_POST['password'] ==  $userPassword){
            
            $_SESSION['user'] = 'admin';
            
            header('Location: ' . HOST . 'index.php');

        }
    }
}

include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');



?>