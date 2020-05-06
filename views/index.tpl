    <div class="title-1">Фильмотека</div>
    <?php
    foreach ($films as $key => $film) {
    ?>
        <div class="card mb-20">
            <div class="row">
                <?php if ($film['photo'] != '') { ?>
                    <!-- col-4 -->
                    <div class="col-auto">
                        <img src="<?= HOST ?>data/films/min/<?= $film['photo'] ?>" alt="<?= $film['title'] ?>">
                    </div>
                    <!-- col-4 -->
                <?php }  ?>                     
                <div class="col">
                    <div class="card__header">
                        <h4 class="title-4"><?= $film['title'] ?></h4>
                        <div>
                            <a href="edit.php?id=<?= $film['id'] ?>" class="button button--editsmall">Редактировать</a>
                            <a href="?action=delete&id=<?= $film['id'] ?>" class="button button--removesmall">Удалить</a>
                        </div>
                    </div>
                    <div class="badge"><?= $film['genre'] ?></div>
                    <div class="badge"><?= $film['year'] ?></div>
                    <a href="single.php?id=<?= $film['id'] ?>" class="button button--small">Подробнеее</a>
                </div>
            </div>
        </div>
    <?php } ?>