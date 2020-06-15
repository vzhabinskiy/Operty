<?php
require_once "../engine/Db.php";
$db = new Db();
$content = $db->selectProjects();
$avatar = $db->selectAvatars();
$currentUser = $db->selectCurrentUser();
$typeOfProject = $db->selectTypeOfProjects();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>All projects</title>
</head>

<body>
    <header class=" header mb-5">
        <a href="index.php">
            <img src="../../source/img/menu_logo.svg" alt="Логотип Operty">
        </a>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="index.php" class="menu__link">Проекты</a>
                </li>
                <li class="menu__item">
                    <a href="search-executors.php" class="menu__link">Найти исполнителей</a>
                </li>
                <li class="menu__item">
                    <a href="manual.php" class="menu__link">Инструкция</a>
                </li>
            </ul>
        </nav>
        <div class="header__toolbar">
            <a id="invite-project" href="#pop-up__invite">
                <button class="button button_border button_icon">
                    <img class="button__icon" src="../../source/img/menu_plus.svg" alt="plus">
                    <span class="button__text">Пригласить</span>
                </button>
            </a>
            <div id="pop-up__invite" class="mfp-hide white-popup-block invite-popup">
                <form action="../engine/invite.php" method="POST">
                    <div class="invite-popup__wrapper">
                        <h3 class="h3 mb-3">Приглашение в сервис Operty</h3>
                        <input class="invite-popup__email mb-2" type="email" placeholder="Email">
                        <button type="submit" class="button_login">Отправить</button>
                    </div>
                </form>
            </div>
            <div id="profile_wrapper">
                <?php foreach ($avatar as $key => $value) : ?>
                    <a id="button" aria-describedby="tooltip" href="#" class="profile">
                        <img src="<?= $value["avatar"] ? $value["avatar"] : '/source/img/default-avatar.png' ?>" alt="<?= $value["full_name"] ?>">
                    </a>
                <?php endforeach; ?>
                <div id="tooltip" role="tooltip">
                    <ul>
                        <li class="tooltip__item"><a href="personal-card.php">Личный кабинет</a></li>
                        <li class="tooltip__item"><a href="../engine/logout.php">Выйти</a></li>
                    </ul>
                    <div id="header-popup-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu_container mb-5">
        <a href="index.php" class="mobile-menu_logo">
            <img src="../../source/img/menu_logo.svg" alt="Логотип Operty">
        </a>
        <div class="mobile-menu">
            <span class="menu-burger"></span>
        </div>
    </div>

    <div class="menu_mob">
        <div class="menu_mob__wrapper">
            <div class="menu_mob__top">
                <ul class="menu_mob__top__list">
                    <li class="menu_mob__top__item">
                        <a href="index.php">Проекты</a>
                    </li>
                    <li class="menu_mob__top__item">
                        <a href="search-executors.php">Найти исполнителей</a>
                    </li>
                    <li class="menu_mob__top__item">
                        <a href="manual.php">Инструкция</a>
                    </li>
                </ul>
            </div>
            <div class="menu_mob__bottom">
                <ul class="menu_mob__bottom__list">
                    <li class="menu_mob__bottom__item">
                        <a id="invite-project-mob" href="#pop-up__invite-mob" class="menu_mob__bottom__item">Пригласить</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/plus_mob.svg" alt="Иконка плюса">
                    </li>
                    <li id="pop-up__invite-mob" class="mfp-hide white-popup-block invite-popup invite-popup_mob">
                        <h3 class="h3 h3_mob mb-3">Приглашение в сервис Operty</h3>
                        <input class="invite-popup__email invite-popup__email_mob mb-2" type="email" placeholder="Email">
                        <button class="button_login button_login_mob">Отправить</button>
                    </li>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="personal-card.php">Профиль</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/user_mob.svg" alt="Иконка профиля">
                    </li>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="../engine/logout.php">Выйти</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/logout.svg" alt="Иконка выхода">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex center">
        <main class="main-content">
            <div class="page-header mb-5">
                <h1 class="h1 h1_all-projects">Все проекты</h1>
                <div>
                    <select class="select-projects" style="width: 126px">
                        <option data-sort="Все">Все</option>
                        <option data-sort="Сериал">Сериалы</option>
                        <option data-sort="Фильм">Фильмы</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <a class="create-new row-4 create-new_project mb-3" href="#pop-up__create-new_project">
                    <figure class="create-new__img">
                        <img src="../../source/img/big_plus.svg" alt="иконка плюса">
                    </figure>
                    <p class="create-new__text">Создать проект</p>
                </a>
                <div id="pop-up__create-new_project" class="mfp-hide white-popup-block add-project-popup">
                    <form id="insert-project" method="POST" enctype="multipart/form-data">
                        <div class="add-project-popup__list">
                            <div class="add-project-popup__item-picture mb-3">
                                <img src="../../source/img/default-project.svg" id="image-project" class="add-project-popup__image mb-1" alt="Фото проекта">
                                <input type="file" id="input-file" class="input-file" name="img" />
                                <p class="add-project-popup__info">Рекомендуемый размер фото 166x166 px</p>
                            </div>
                            <div class="add-project-popup__item mb-3">
                                <img class="add-project-popup__blue-round-img" src="../../source/img/blue-round.svg" alt="Иконка круга">
                                <input id="name" class="add-project-popup__item__input-name" name="name" type="text" placeholder="Название проекта" required>
                            </div>
                            <div class="add-project-popup__item mb-3">
                                <img class="add-project-popup__movie-icon" src="../../source/img/movie_icon.svg" alt="Иконка фильма">
                                <select class="select-responsible-add" style="width: 220px; height:40px" id="id_type_of_project" name="id_type_of_project">
                                    <?php foreach ($typeOfProject as $key => $value) : ?>
                                        <option value="<?= $value["id"] ?>"><?= $value["type"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <input type="hidden" name="id_user" id="id_user" value="<?= $currentUser[0]['id'] ?>">
                            </div>
                            <button class="button__add-project" type="submit">Сохранить</button>
                        </div>
                    </form>
                </div>
                <?php foreach ($content as $key => $value) : ?>

                    <a data-cat="<?= $value["type"] ?>" href="project-card.php?id_project=<?= $value["id"] ?>" class="card row-4 card_project mb-3">
                        <figure class="card__img card__img_project">
                            <img src="<?= $value["img"] ?>" alt="<?= $value["name"] ?>">
                        </figure>
                        <h3 class="card__title mb-2"><?= $value["name"] ?></h3>
                        <span class="card__subtitle"><?= $value["type"] ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/select.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/popupCreateNew.js"></script>
    <script src="../../source/js/imagesUpload.js"></script>
    <script src="../../source/js/dropMenu.js"></script>
    <script src="../../source/jquery-fileinput/jquery.fileinput.js"></script>
    <script src="../../source/js/projectRequests.js"></script>
    <script src="../../source/js/buttonClose.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/js/sort.js"></script>
</body>

</html>