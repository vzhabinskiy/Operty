<?php
require_once "../engine/Db.php";
$db = new Db();
$avatar = $db->selectAvatars();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <section class="manual">
        <div class="manual__title">
            <h1 class="h1 mb-10">Инструкция по использованию сервиса "Operty"</h1>
        </div>
        <div class="manual__list">
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">1. Как создать проект?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                        <p class="manual__answer mb-3">Для создания проекта нужно нажать на зеленую карточку "Создать проект". Далее необходимо добавить изображение
                        проекта, заполнить все поля в модальном окне и сохранить.</p>
                        <div class="manual__img__list">
                            <img class="manual__img" src="../../source/img/manual_1.jpg" alt="">
                            <img class="manual__img" src="../../source/img/manual_2.jpg" alt="">
                        </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">2. Как создать сценарий?</p>
                    <a class="manual__icon"></a>
                </div>
                        <div class="manual__hide">
                        <p class="manual__answer mb-3">Действуйте по аналогии с созданием проекта (см. 1 вопрос).</p>
                        <div class="manual__img__list">
                            <img class="manual__img" src="../../source/img/manual_3.jpg" alt="">
                            <img class="manual__img" src="../../source/img/manual_4.jpg" alt="">
                        </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">3. Как создать серию?</p>
                    <a class="manual__icon"></a>
                </div>
                    <div class="manual__hide">
                        <p class="manual__answer mb-3">Для создания серии нужно открыть сценарий проекта. Далее откроется страница с текстовым редактором, предназначенным
                        для написания серий. При создании серии необходимо заполнить все поля (номер, название, текст).</p>
                        <div class="manual__img__list">
                            <img class="manual__img" src="../../source/img/manual_5.jpg" alt="">
                            <img class="manual__img" src="../../source/img/manual_6.jpg" alt="">
                        </div>
                    </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">4. Как отредактировать или удалить проект?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer">Для редактирования и удаления проекта нужно зайти в проект и нажать кнопку "Редактировать"/"Удалить". 
                    Примечание: данный функционал доступен только для автора проекта.</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_7.jpg" alt="">
                        <img class="manual__img" src="../../source/img/manual_8.jpg" alt="">
                    </div>
                </div>
            </div> 
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">5. Как отредактировать или удалить сценарий?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer mb-3">Действуйте по аналогии с редактированием и удалением проекта (см. 4 вопрос).
                Примечание: данный функционал доступен только для автора проекта.</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_9.jpg" alt="">
                        <img class="manual__img" src="../../source/img/manual_10.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">6. Как отредактировать или удалить серию?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer mb-3">Для редактирования или удаления серии необходимо зайти в серию и нажать кнопку "Редактировать"/"Удалить".</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_11.jpg" alt="">
                        <img class="manual__img" src="../../source/img/manual_12.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">7. Как запланировать живое мероприятие для труппы?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer mb-3">На странице "Расписание" нужно выбрать и нажать на дату мероприятия в календаре. Далее необходимо заполнить 
                    все поля в модальном окне и сохранить.
                    Примечание: данный функционал доступен только для автора проекта.</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_13.jpg" alt="">
                        <img class="manual__img" src="../../source/img/manual_14.jpg" alt="">
                    </div>
                </div>  
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">8. Где я могу найти исполнителей для своего проекта?</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer mb-3">Для этого предусмотрена страница "Найти исполнителей". 
                        На ней выводятся все зарегистирированные пользователи сервиса.</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_15.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">9. Как добавить исполнителя в свой проект? </p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                    <p class="manual__answer mb-3">Для добавления исполнителя в проект нужно перейти на страницу исполнителя и нажать кнопку "Добавить исполнителя".
                    Далее необходимо выбрать проект, в который нужно добавить исполнителя, и нажать кнопку "Добавить". После этого 
                    исполнитель становится участником проекта.</p>
                    <div class="manual__img__list">
                        <img class="manual__img" src="../../source/img/manual_16.jpg" alt="">
                        <img class="manual__img" src="../../source/img/manual_17.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="manual__item mb-5">
                <div class="manual__head mb-3">
                    <p class="manual__question">10. Разделение прав пользователей сервиса.</p>
                    <a class="manual__icon"></a>
                </div>
                <div class="manual__hide">
                <p class="manual__answer mb-3">Автор проекта имеет доступ к следующему функционалу внутри проекта: 
                    <span>- редактирование/удаление проекта;</span>
                    <span>- создание, редактирование и удаление мероприятия в календаре;</span>
                    <span>- создание, редактирование и удаление сценарии;</span>
                    <span>- создание, редактирование и удаление серии;</span>
                    <span>- добавление, удаления исполнителя из участников проекта.</span>
                </p>
                </div>
            </div> 
        </div>
    </section>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/accordion.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/js/toggle.js"></script>
</body>
</html>