<?php
require_once "../engine/Db.php";
$db = new Db();
$userId = $_GET['id_user'];
$content = $db->selectCards($userId);
$projects = $db->selectProjects();
$avatar = $db->selectAvatars();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Executor card</title>
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
        <main class="main-content main-content_min">
            <?php foreach ($content as $key => $value) : ?>
                <div class="page-header mb-5">
                    <div class="page-header__left">
                        <a href="search-executors.php" class="page-header__left-icon">
                            <img src="../../source/img/back2.svg" alt="вернуться">
                        </a>
                        <h1 class="h1 h1_left h1_executor-card"><?= $value["full_name"] ?></h1>
                        <span class="page-header__info"><?= $value["type"] ?></span>
                    </div>
                </div>
                <div class="executor">
                    <div class="executor-avatar">
                        <figure class="executor-avatar__main mb-4">
                            <img src="<?= $value["avatar"] ? $value["avatar"] : '/source/img/default-avatar.png' ?>" alt="<?= $value["full_name"] ?>">
                        </figure>
                        <?php if ($_SESSION['user_id'] != $userId) : ?>
                            <a id="invite-participant" href="#pop-up__invite-participant">
                                <button class="button button_executor mb-4">Добавить участника</button>
                            </a>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <div id="pop-up__invite-participant" class="mfp-hide white-popup-block invite-participant-popup">
                            <form id="insert-participant">
                                <div class="invite-participant-popup_list">
                                    <h3 class="h3 mb-4">Добавление участника в проект</h3>
                                    <p class="invite-participant-popup_text mb-1">Выберите проект:</p>
                                    <div class="mb-4">
                                        <select class="select-user-projects" style="width: 240px" id="id_project" name="id_project">
                                            <?php foreach ($projects as $key => $value) : ?>
                                                <option value="<?= $value["id"] ?>"><?= $value["name"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $userId ?>">
                                    <button type="submit" class="button__add-participant mb-2">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php foreach ($content as $key => $value) : ?>
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
                            <p class="executor-intro__description"><?= $value["about_me"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/js/participantsRequests.js"></script>
    <script src="../../source/js/select.js"></script>
</body>

</html>