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

$film = get_film($link, $_GET['id']);

include('views/head.tpl');
include('views/notifications.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');