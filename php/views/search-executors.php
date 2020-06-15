<?php
require_once "../engine/Db.php";
$db = new Db();
$content = $db->selectUsers();
$avatar = $db->selectAvatars();
$countUsers = $db->selectCountUsers();
$professions = $db->selectProfessions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.css" rel="stylesheet">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Search executors</title>
</head>

<body>
    <header class="header mb-5">
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
                    <img class="button__icon" src="../../source/img/menu_plus.svg" alt="иконка плюса">
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
                        <img class="menu_mob__bottom__icon" src="../../source/img/plus_mob.svg" alt="Иконка поиска">
                    </li>
                    <li id="pop-up__invite-mob" class="mfp-hide white-popup-block invite-popup invite-popup_mob">
                        <h3 class="h3 h3_mob mb-3">Приглашение в сервис Operty</h3>
                        <input class="invite-popup__email invite-popup__email_mob mb-2" type="email" placeholder="Email">
                        <button class="button_login button_login_mob">Отправить</button>
                    </li>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="personal-card.php">Профиль</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/user_mob.svg" alt="Иконка поиска">
                    </li>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="../engine/logout.php">Выйти</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/logout.svg" alt="Иконка поиска">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex center">
        <main class="main-content main-content_project-card">
            <div class="page-header page-header_adapt mb-5">
                <h1 class="h1 mb-2_adapt">Поиск исполнителей</h1>
                <p class="page-header__text mb-2_adapt">Найдено <?= $countUsers[0]['COUNT(id)'] ?> исполнителей</p>
                <select class="select-executors" style="width: 126px">
                    <option data-proff="Все">Все</option>
                    <option data-proff="Продюсер">Продюсеры</option>
                    <option data-proff="Режиссер">Режиссеры</option>
                    <option data-proff="Сценарист">Сценаристы</option>
                    <option data-proff="Актер">Актеры</option>
                    <option data-proff="Композитор">Композиторы</option>
                    <option data-proff="Художник">Художники</option>
                </select>
            </div>
            <div class="row">
                <?php foreach ($content as $key => $value) : ?>
                    <a data-executor="<?= $value["type"] ?>" href="executor-card.php?id_user=<?= $value["id"] ?>" class="card row-2 card_executor mb-3">
                        <div class="card_executor-top mb-3">
                            <figure class="card_executor__img ">
                                <img src="<?= $value["avatar"] ? $value["avatar"] : '/source/img/default-avatar.png' ?>" alt="<?= $value["full_name"] ?>">
                            </figure>
                            <div class="card_executor__intro">
                                <h3 class="card_executor__title mb-1"><?= $value["full_name"] ?></h3>
                                <span class="card_executor__subtitle"><?= $value["type"] ?></span>
                            </div>
                        </div>
                        <div class="card_executor-bottom">
                            <div class="card_executor__data-list mb-1">
                                <span class="card_executor__data-item">Возраст</span>
                                <span class="card_executor__data-item card_executor__data-item_value"><?= $value["age"] ?></span>
                            </div>
                            <div class="card_executor__info-list">
                                <span class="card_executor__info-item">Место рождения</span>
                                <span class="card_executor__info-item card_executor__info-item_value"><?= $value["place_of_birth"] ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/select.js"></script>
    <script src="../../source/js/filterRangeSlider.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/accordion.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/js/sort.js"></script>
</body>

</html>