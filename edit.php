<?php

require('config.php');
require('database.php');
// Возращаем функцию
$link = db_connect();
require('models/films.php');
require('functions\login-functions.php');


// Обновление в базы данных
if (array_key_exists('updateFilm', $_POST)) {
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
        // Запись в базу данных
        if (empty($errors)) {
            $result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description']);
            if (($result)) {
                $notifySucces =  "<p>Фильм успешно обновлен!</p>";
            } else {
                $notifyError = "<p>Что-то пошло не так!Попробуйте еще раз!</p>";
            }
        }        
    }
}

$film = get_film($link, $_GET['id']);


echo"<pre>";
print_r($film);
echo"</pre>";

include('views/head.tpl');
include('views/notifications.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>
