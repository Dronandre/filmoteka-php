<?php

require('config.php');
require('database.php');
// Возращаем функцию
$link = db_connect();
require('models/films.php');

// Добавляем в базу данных
if (array_key_exists('newFilm', $_POST)) {

    // Обработка ошибок
    if ($_POST['title'] == '') {
        $errors[] = "<p>Необходимо ввести название фильма!</p>";
    }
    if ($_POST['genre'] == '') {
        $errors[] = "<p>Необходимо ввести жанр фильма!</p>";
    }
    if ($_POST['year'] == '') {
        $errors[] = "<p>Необходимо ввести год создания фильма!</p>";
    }    

    if (empty($errors)) {
        $result = films_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'] );
        if (($result)) {
            $notifySucces =  "<p>Фильм успешно добавлен!</p>";
        } else {
            $notifyError = "<p>Что-то пошло не так!Попробуйте еще раз!</p>";
        }
    }
    
}

include('views/head.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>




