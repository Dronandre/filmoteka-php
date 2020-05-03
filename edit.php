<?php
// Подключение к базе данных
$link = mysqli_connect('localhost', 'root', 'root', 'filmoteka');

// Проверка подключения
if (mysqli_connect_error()) {
    die("Ошибка подключения к базе данных!");
}

$errors = array();

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
        $query = "  UPDATE films 
                    SET title = '" . mysqli_real_escape_string($link, $_POST['title']) . "',
                    genre = '" . mysqli_real_escape_string($link, $_POST['genre']) . "' , 
                    year = '" . mysqli_real_escape_string($link, $_POST['year']) . "' 
                    WHERE id = '".mysqli_real_escape_string($link, $_GET['id'])."' LIMIT 1";
                                    
                
        if (mysqli_query($link, $query)) {
            $notifySucces =  "<p>Фильм успешно отредактирован!</p>";
        } else {
            $notifyError = "<p>Что-то пошло не так!Попробуйте еще раз!</p>";
        }
    }
}

// Показ фильмов из базы данных
$query = "SELECT * FROM films WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id']) . " ' ";
$result = mysqli_query($link, $query);
if ($result = mysqli_query($link, $query)) {
    $film = mysqli_fetch_array($result);
}

// Удаление фильма
if ( @$_GET['action'] == 'delete') {
    $query = "DELETE FROM films WHERE id = ' " . mysqli_real_escape_string($link, $_GET['id']) . " ' LIMIT 1";
    mysqli_query($link, $query);

    if ( mysqli_affected_rows($link) > 0) {
        $notifyInfo = "<p>Фильм был удален!</p>";
    }        
}


?>

<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <title>[Имя и фамилия] - Фильмотека</title>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
    <meta name="keywords" content="" />
    <meta name="description" content="" /><!-- build:cssVendor css/vendor.css -->
    <link rel="stylesheet" href="libs/normalize-css/normalize.css" />
    <link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
    <link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" /><!-- endbuild -->
    <!-- build:cssCustom css/main.css -->
    <link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<body class="index-page">
    <div class="container user-content section-page">
        <!-- Показ сообщений при изменении базы -->
        <?php if ( @$notifySucces != "") { ?> 
        <div class="notify notify--success mb-20"><?= $notifySucces ?></div>
        <?php } else if ( @$notifyError != "") { ?> 
        <div class="notify notify--error mb-20"><?= $notifyError ?></div> 
        <?php } else if ( @$notifyInfo != "") {?> 
        <div class="notify notify--update mb-20"><?= $notifyInfo ?></div> 
        <?php } ?>
        
        <div class="title-1">Фильм <?= $film['title'] ?> </div>
        
        <div class="panel-holder mt-0 mb-40">
            <div class="title-3 mt-0">Редактировать фильм</div>
            <form action="edit.php?id=<?= $film['id']?>" method="POST">
            <?php 
                if(!empty($errors)){
                    foreach ($errors as $key => $value) {
                    echo "<div class='notify notify--error mb-20'>$value</div>";
                    }
                }
            ?>
                <!-- <div class="notify notify--error mb-20">Название фильма не может быть пустым.</div> -->
                <div class="form-group"><label class="label">Название фильма<input class="input" value="<?= $film['title'] ?>" name="title" type="text" placeholder="Такси 2" /></label></div>
                <div class="row">
                    <div class="col">
                        <div class="form-group"><label class="label">Жанр<input class="input" value="<?= $film['genre'] ?>" name="genre" type="text" placeholder="комедия" /></label></div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label class="label">Год<input class="input" value="<?= $film['year'] ?>" name="year" type="text" placeholder="2000" /></label></div>
                    </div>
                </div>
                <div class="card__header">
                    <input class="button button--save" type="submit" name="updateFilm" value="Сохранить изменения" />
                    <a href="index.php?action=delete&id=<?= $film['id']?>"class="button button--remove">Удалить</a> 
                </div>                
            </form>            
        </div>
        <div><a href="./index.php" class="button">Перейти на главную</a></div>
    </div><!-- build:jsLibs js/libs.js -->
    <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
    <!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script><!-- endbuild -->
    <!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>