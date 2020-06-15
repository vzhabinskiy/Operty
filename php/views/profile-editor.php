<?php
require_once "../engine/Db.php";
$db = new Db();
$content = $db->selectProfessions();
$avatar = $db->selectAvatars();
$currentUser = $db->selectCurrentUser();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
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
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form id="edit-profile" method="POST" enctype="multipart/form-data">
                <div class="profile-editor">
                    <h1 class="h1 h1_center mb-4">Редактирование профиля</h1>
                    <span id="msg-edit"></span>
                    <input type="hidden" name="id" id="id" value="<?= $currentUser[0]["id"] ?>">
                    <div class="profile-editor__img__wrapper">
                        <img src="<?= $currentUser[0]["avatar"] ? $currentUser[0]["avatar"] : '/source/img/default-avatar.png' ?>" id="image-profile" class="profile-editor__img mb-1" alt="аватар">
                        <input id="input-file-profile-editor" type="file" class="input-file-profile-editor" name="img" />
                    </div>
                    <div class="profile-editor__row mb-2">
                        <div class="profile-editor__label">Имя</div>
                        <div class="profile-editor__value profile-editor__value_name">
                            <input name="full_name" id="full_name" type="text" value="<?= $currentUser[0]["full_name"] ?>">
                        </div>
                    </div>
                    <div class="profile-editor__row mb-2">
                        <div class="profile-editor__label">Возраст</div>
                        <div class="profile-editor__value profile-editor__value_age">
                            <input name="age" id="age" type="text" value="<?= $currentUser[0]["age"] ?>">
                        </div>
                    </div>
                    <div class="profile-editor__row mb-4">
                        <div class="profile-editor__label profile-editor__label_gender">Пол</div>
                        <div class="profile-editor__switch ">
                            <input class="radio" id="radio-1" type="radio" value="1" name="id_gender" <?= $currentUser[0]["id_gender"] == 1 ? 'checked' : '' ?> />
                            <label for="radio-1"></label>
                            <input class="radio" id="radio-2" type="radio" value="2" name="id_gender" <?= $currentUser[0]["id_gender"] == 2 ? 'checked' : '' ?> />
                            <label for="radio-2"></label>
                        </div>
                    </div>
                    <div class="profile-editor__row mb-3">
                        <div class="profile-editor__label">Профессия</div>
                        <select class="select-responsible-add" style="width: 160px; height:40px" id="id_profession" name="id_profession">
                            <?php foreach ($content as $key => $value) : ?>
                                <option <?= ($value['type'] == $currentUser[0]['type'] ? 'selected' : '') ?> value="<?= $value['id'] ?>"> <?= $value['type'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="profile-editor__row mb-2">
                        <div class="profile-editor__label">Место рождения</div>
                        <div class="profile-editor__value profile-editor__value_birth">
                            <input name="place_of_birth" id="place_of_birth" type="text" value="<?= $currentUser[0]["place_of_birth"] ?>">
                        </div>
                    </div>
                    <div class="profile-editor__row mb-2">
                        <div class="profile-editor__label">О себе</div>
                        <div class="">
                            <textarea name="about_me" id="about_me" class="profile-editor__value_info"><?= $currentUser[0]["about_me"] ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="button__profile-editor">Сохранить</button>
                </div>
            </form>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/select.js"></script>
    <script src="../../source/js/profileUpdateRequest.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/buttonClose.js"></script>
    <script src="../../source/js/imagesUpload.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/defaultAvatar.js"></script>
    <script src="../../source/jquery-fileinput/jquery.fileinput.js"></script>
</body>

</html>