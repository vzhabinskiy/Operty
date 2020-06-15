<?php
require_once "../engine/Db.php";
$db = new Db();
$avatar = $db->selectAvatars();
$content = $db->selectCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Personal card</title>
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
                    <img class="button__icon" src="../../source/img/menu_plus.svg">
                    <p class="button__text">Пригласить</p>
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
                        <li class="tooltip__item"><a href="../engine/logout.php">Выйти</a></li>
                    </ul>
                    <div id="header-popup-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-menu_container mb-5">
        <a href="/" class="mobile-menu_logo">
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
                    <div id="pop-up__invite-mob" class="mfp-hide white-popup-block invite-popup invite-popup_mob">
                        <h3 class="h3 h3_mob mb-3">Приглашение в сервис Operty</h3>
                        <input class="invite-popup__email invite-popup__email_mob mb-2" type="email" placeholder="Email">
                        <button class="button_login button_login_mob">Отправить</button>
                    </div>
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
        <main class="main-content main-content_min">
            <div class="page-header mb-5">
                <div class="page-header__left">
                    <?php foreach ($content as $key => $value) : ?>
                        <h1 class="h1 h1_left h1_executor-card"><?= $value["full_name"] ?></h1>
                        <span class="page-header__info"><?= $value["type"] ?></span>
                </div>
            </div>
            <div class="executor">
                <div class="executor-avatar">
                    <figure class="executor-avatar__main mb-4">
                        <img src="<?= $value["avatar"] ? $value["avatar"] : '/source/img/default-avatar.png' ?>" alt="<?= $value["full_name"] ?>">
                    </figure>
                    <a href="profile-editor.php"><button class="button button_executor mb-4">Редактировать</button></a>
                </div>
                <div class="executor-intro">
                    <div class="executor-intro__top mb-10">
                        <div class="executor-intro__data-list mb-3">
                            <p class="executor-intro__data-item mb-1">Возраст</p>
                            <p class="executor-intro__data-item executor-intro__data-item-value"><?= $value["age"] ?></p>
                        </div>
                        <div class="executor-intro__info-list">
                            <p class="executor-intro__info-item mb-1">Место рождения</p>
                            <p class="executor-intro__info-item executor-intro__info-item-value"><?= $value["place_of_birth"] ?></p>
                        </div>
                    </div>
                    <div class="executor-intro__about mb-10">
                        <h6 class="h6 mb-2">О себе</h6>
                        <p class="executor-intro__description"><?= $value["about_me"] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
</body>

</html>