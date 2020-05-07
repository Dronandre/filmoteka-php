<h1>Укажите ваши данные</h1>

<form action="set-cookie.php" method="POST" class="mb-30">
    <!-- <div class="notify notify--error mb-20">Название фильма не может быть пустым.</div> -->
    <div class="form-group"><label class="label">Ваше имя:<input class="input" name="user-name" type="text" placeholder="Ваше имя:"></label></div>
    <div class="form-group"><label class="label">Ваш город:<input class="input" name="user-city" type="text" placeholder="Ваш город:"></label></div>
     
    <input class="button" type="submit" name="user-submit" value="Сохранить">
</form>

<form action="unset-cookie.php" method="POST">     
    <input class="button" type="submit" name="user-unset" value="Удалить данные">
</form>