<?php

require('config.php');
require('database.php');
// Возращаем функцию
$link = db_connect();
require('models/films.php');
require('functions\login-functions.php');

// Удаление фильма
if (@$_GET['action'] == 'delete') {
    $result = film_delete($link, $_GET['id']);      
    if ($result) {
        $notifyInfo = "<p>Фильм был удален!</p>";
    }  
}

$films = films_all($link);


include('views/head.tpl');
include('views/notifications.tpl');
include('views/index.tpl');
include('views/footer.tpl');