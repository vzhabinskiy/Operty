<?php
require_once "../engine/Db.php";
$db = new Db();
if (isset($_GET['id_project'])) {
    $projectId = $_GET['id_project'];
    $_SESSION['id_project'] = $_GET['id_project'];
    $project = $db->selectProject($projectId);
}
$avatar = $db->selectAvatars();
$project_id = $db->selectProjects();
$typeOfProject = $db->selectTypeOfProjects();
$project = $db->selectProject($projectId);
$content = $db->selectProfessions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href='../../source/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='../../source/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='../../source/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='../../source/fullcalendar/packages/list/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="../../source/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Timetable</title>
</head>

<body>
    <header class=" header mb-10">
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
            <div class="menu_mob__middle">
                <ul class="menu_mob__middle__list">
                    <li class="menu_mob__middle__item">
                        <a href="project-card.php?id_project=<?= $project[0]["id"] ?>">Сценарии</a>
                    </li>
                    <li class="menu_mob__middle__item">
                        <a href="timetable.php?id_project=<?= $project[0]["id"] ?>">Расписание</a>
                    </li>
                    <li class="menu_mob__middle__item">
                        <a href="participants.php?id_project=<?= $project[0]["id"] ?>">Участники</a>
                    </li>
                    <?php if ($project[0]['author'] == true) : ?>
                        <li class="menu_mob__middle__item ">
                            <a id="edit-project-popup-mob" href="#pop-up__edit_project-mob">Редактировать</a>
                            <img src="../../source/img/edit.svg" class="menu_mob__bottom__icon" alt="Редактировать">
                            <div id="pop-up__edit_project-mob" class="mfp-hide white-popup-block add-project-popup">
                                <form id="edit-project-mob" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?= $project[0]["id"] ?>">
                                    <div class="add-project-popup__list">
                                        <div class="add-project-popup__item-picture mb-3">
                                            <img src="<?= $project[0]["img"] ?>" id="image-project" class="add-project-popup__image mb-1" alt="фото проекта">
                                            <input type="file" id="input-file" class="input-file" name="img" />
                                            <p class="add-project-popup__info">Рекомендуемый размер фото 166x166 px</p>
                                        </div>
                                        <div class="add-project-popup__item mb-3">
                                            <img class="add-project-popup__blue-round-img" src="../../source/img/blue-round.svg" alt="иконка круга">
                                            <input id="name" maxlength="30" value="<?= $project[0]["name"] ?>" class="add-project-popup__item__input-name" name="name" type="text" placeholder="Название проекта">
                                        </div>
                                        <div class="add-project-popup__item mb-3">
                                            <img class="add-project-popup__movie-icon" src="../../source/img/movie_icon.svg" alt="иконка фильма">
                                            <select class="select-responsible-add" style="width: 220px; height:40px" id="id_type_of_project" name="id_type_of_project">
                                                <?php foreach ($typeOfProject as $key => $value) : ?>
                                                    <option <?= ($project[0]["type"] == $value['type'] ? 'selected' : '') ?> value="<?= $value["id"] ?>"> <?= $value["type"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="button__add-project" type="submit">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="menu_mob__middle__item">
                            <a id="delete-project-popup-mob" href="#pop-up__delete_project">Удалить</a>
                            <img src="../../source/img/delete.svg" class="menu_mob__bottom__icon" alt="Удалить">
                            <div id="pop-up__delete_project" class="mfp-hide white-popup-block delete-project-popup">
                                <div class="delete-project-popup__list">
                                    <div class="delete-project-popup__item mb-3">
                                        <p class="delete-project-popup__text">Удалить проект "<?= $project[0]["name"] ?>"?</p>
                                    </div>
                                    <div class="delete-project-popup__item">
                                        <a href="../engine/delete_project.php?id=<?= $project[0]["id"] ?>" id="delete-project"><button class="delete-project-popup__button">Удалить проект</button></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="menu_mob__bottom">
                <ul class="menu_mob__bottom__list">
                    <li class="menu_mob__bottom__item">
                        <a id="invite-project-mob" href="#pop-up__invite-mob" class="menu_mob__bottom__item">Пригласить</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/plus_mob.svg" alt="Пригласить">
                    </li>
                    <div id="pop-up__invite-mob" class="mfp-hide white-popup-block invite-popup invite-popup_mob">
                        <h3 class="h3 h3_mob mb-3">Приглашение в сервис Operty</h3>
                        <input class="invite-popup__email invite-popup__email_mob mb-2" type="email" placeholder="Email">
                        <button class="button_login button_login_mob">Отправить</button>
                    </div>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="personal-card.php">Профиль</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/user_mob.svg" alt="Профиль">
                    </li>
                    <li class="menu_mob__bottom__item">
                        <a class="menu_mob__bottom__item" href="../engine/logout.php">Выйти</a>
                        <img class="menu_mob__bottom__icon" src="../../source/img/logout.svg" alt="Выйти">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex">
        <aside class="sidebar sidebar_flex-basis">
            <div class="sidebar__top-list mb-4">
                <ul>
                    <li class=" mb-3 sidebar__top-list__item">
                        <img class="sidebar_list-img" src="../../source/img/home2.svg" alt="Сценарии">
                        <a class="sidebar_list-text" href="project-card.php?id_project=<?= $project[0]["id"] ?>">Сценарии</a>
                    </li>
                    <li class="mb-3 selected_item">
                        <img class="sidebar_list-img" src="../../source/img/timetable_green.svg" alt="Расписание">
                        <a class="sidebar_current-list__item" href="timetable.php?id_project=<?= $project[0]["id"] ?>">Расписание</a>
                    </li>
                    <li class="mb-3 sidebar__top-list__item">
                        <img class="sidebar_list-img" src="../../source/img/participants_icon.svg" alt="Участники">
                        <a class="sidebar_list-text" href="participants.php?id_project=<?= $project[0]["id"] ?>">Участники</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__bottom-list">
                <ul>
                    <?php if ($project[0]['author'] == true) : ?>
                        <li class="sidebar__bottom-list__item mb-3">
                            <img src="../../source/img/edit.svg" class="sidebar_list-img" alt="Редактировать">
                            <a class="sidebar_list-text" id="edit-project-popup" href="#pop-up__edit_project">Редактировать</a>
                            <div id="pop-up__edit_project" class="mfp-hide white-popup-block add-project-popup">
                            <form id="edit-project" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?= $project[0]["id"] ?>">
                                <div class="add-project-popup__list">
                                    <div class="add-project-popup__item-picture mb-3">
                                    <img src="<?= $project[0]["img"] ?>" id="image-project-mob" class="add-project-popup__image mb-1" alt="фото проекта">
                                        <input type="file" id="input-file-mob" class="input-file-mob" name="img" />
                                        <p class="add-project-popup__info">Рекомендуемый размер фото 166x166 px</p>
                                    </div>
                                    <div class="add-project-popup__item mb-3">
                                        <img class="add-project-popup__blue-round-img" src="../../source/img/blue-round.svg" alt="иконка круга">
                                        <input id="name" maxlength="30" value="<?= $project[0]["name"] ?>" class="add-project-popup__item__input-name" name="name" type="text" placeholder="Название проекта">
                                    </div>
                                    <div class="add-project-popup__item mb-3">
                                        <img class="add-project-popup__movie-icon" src="../../source/img/movie_icon.svg" alt="иконка фильма">
                                        <select class="select-responsible-add" style="width: 220px; height:40px" id="id_type_of_project" name="id_type_of_project">
                                            <?php foreach ($typeOfProject as $key => $value) : ?>
                                                <option <?= ($project[0]["type"] == $value['type'] ? 'selected' : '') ?> value="<?= $value["id"] ?>"> <?= $value["type"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button class="button__add-project" type="submit">Сохранить</button>
                                </div>
                            </form>
                        </div>
                        </li>
                        <li class="sidebar__bottom-list__item">
                            <img src="../../source/img/delete.svg" class="sidebar_list-img" alt="Удалить">
                            <a class="sidebar_list-text" id="delete-project-popup" href="#pop-up__delete_project">Удалить</a>
                            <div id="pop-up__delete_project" class="mfp-hide white-popup-block delete-project-popup">
                                <div class="delete-project-popup__list">
                                    <div class="delete-project-popup__item mb-3">
                                        <p class="delete-project-popup__text">Удалить проект "<?= $project[0]["name"] ?>"?</p>
                                    </div>
                                    <div class="delete-project-popup__item">
                                        <a href="../engine/delete_project.php?id=<?= $project[0]["id"] ?>" id="delete-project"><button class="delete-project-popup__button">Удалить проект</button></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>
        <main class="main-content main-content_project-card">
            <div class="page-header mb-2">
                <div class="mb-2_adapt">
                    <h1 class="h1">Расписание</h1>
                </div>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>

            <div id="calendar" data-selectable="<?= $project[0]['author'] ? 'true' : 'false'; ?>"></div>
            <a class="popup-with-add-form" href="#add-event-form"></a>
            <form id="add-event-form" method="POST" enctype="multipart/form-data" class="mfp-hide white-popup-block add-event-popup">
                <span id="msg-reg"></span>
                <ul class="add-event-popup-list">
                    <li class="add-event-popup-item mb-2">
                        <label for="title"></label>
                        <img class="add-event-popup__blue-round-img" src="../../source/img/blue-round.svg" alt="иконка круга">
                        <input id="title" maxlength="30" class="add-event-popup-item_input-title" name="title" type="text" placeholder="Название мероприятия" required>
                    </li>
                    <div class="add-event-popup-line-1 mb-2">
                        <li class="add-event-popup-line-1-item add-event-popup-line-1-item_adapt">
                            <img class="" src="../../source/img/responsible-min.svg" alt="иконка исполнителей">
                            <select class="select-responsible-add" style="width: 220px; height:40px" id="responsible" name="responsible">
                                <?php foreach ($content as $key => $value) : ?>
                                    <option value="<?= $value["id"] ?>"><?= $value["type"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <li class="add-event-popup-line-1-item">
                            <img class="" src="../../source/img/nav.svg" alt="иконка местонахождения">
                            <input class="add-event-popup-line-1__input" id="place" name="place" type="text" placeholder="Место проведения" required>
                        </li>
                    </div>
                    <div class="add-event-popup-line-2 mb-2">
                        <li class="add-event-popup-line-1-item add-event-popup-line-1-item_adapt">
                            <img class="add-event-popup__img" src="../../source/img/start.svg" alt="начало события">
                            <input class="add-event-popup-line-2__input" id="start" name="start" type="text" placeholder="Начало события" required>
                        </li>
                        <li class="add-event-popup-line-1-item">
                            <img class="add-event-popup__img" src="../../source/img/end.svg" alt="конец события">
                            <input class="add-event-popup-line-2__input" id="end" name="end" type="text" placeholder="Конец события" required>
                        </li>
                    </div>
                    <li class="add-event-popup-item mb-2">
                        <label for="description"></label>
                        <textarea id="description" maxlength="100" class="add-event-popup-item_input-description" name="description" placeholder="Добавьте описание" required></textarea>
                    </li>
                    <input type="hidden" name="id_project" id="id_project" value="<?= $project[0]["id"] ?>">
                    <button type="submit" class="add-event-button">Сохранить</button>
                </ul>
            </form>
            <a class="popup-with-details" href="#details"></a>
            <div id="details" class="mfp-hide white-popup-block details-popup">
                <div class="event-detail">
                    <div class=" mb-2">
                        <h3 class="h3">Детали мероприятия</h3>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Название</div>
                        <div class="event-detail-item__value" id="title"></div>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Место проведения</div>
                        <div class="event-detail-item__value" id="place"></div>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Начало мероприятия</div>
                        <div class="event-detail-item__value" id="start"></div>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Конец мероприятия</div>
                        <div class="event-detail-item__value" id="end"></div>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Описание</div>
                        <div class="event-detail-item__value event-detail-item__value_description" id="description"></div>
                    </div>
                    <?php if ($project[0]['author'] == true) : ?>
                        <button class="button-edit mb-2">Редактировать</button>
                        <a href="" id="button-delete"><button class="button-delete">Удалить</button></a>
                    <?php endif; ?>
                </div>
                <div class="edit-form">
                    <form id="edit-event-form" method="POST" enctype="multipart/form-data" class="white-popup-block popup mb-2 edit-event-popup">
                        <span id="msg-edit"></span>
                        <input type="hidden" name="id" id="id">
                        <ul class="add-event-popup-list">
                            <li class="add-event-popup-item mb-2">
                                <label for="title"></label>
                                <img class="add-event-popup__blue-round-img-2" src="../../source/img/blue-round.svg" alt="иконка круга">
                                <input id="title" maxlength="30" class="add-event-popup-item_input-title" name="title" type="text" placeholder="Название мероприятия">
                            </li>
                            <div class="add-event-popup-line-1 mb-2">
                                <li class="add-event-popup-line-1-item add-event-popup-line-1-item_adapt">
                                    <img class="" src="../../source/img/responsible-min.svg" alt="иконка исполнителей">
                                    <select style="width: 220px; height:40px" id="responsible" name="responsible">
                                        <?php foreach ($content as $key => $value) : ?>
                                            <option value="<?= $value["id"] ?>"><?= $value["type"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <li class="add-event-popup-line-1-item">
                                    <img class="" src="../../source/img/nav.svg" alt="иконка местонахождения">
                                    <input class="add-event-popup-line-1__input" id="place" name="place" type="text" placeholder="Место проведения">
                                </li>
                            </div>
                            <div class="add-event-popup-line-2 mb-2">
                                <li class="add-event-popup-line-1-item add-event-popup-line-1-item_adapt">
                                    <img class="add-event-popup__img" src="../../source/img/start.svg" alt="начало события">
                                    <input class="add-event-popup-line-2__input" id="start" name="start" type="text" placeholder="Начало события">
                                </li>
                                <li class="add-event-popup-line-1-item">
                                    <img class="add-event-popup__img" src="../../source/img/end.svg" alt="конец события">
                                    <input class="add-event-popup-line-2__input" id="end" name="end" type="text" placeholder="Конец события">
                                </li>
                            </div>
                            <li class="add-event-popup-item mb-2">
                                <label for="description"></label>
                                <textarea id="description" class="add-event-popup-item_input-description" name="description" placeholder="Добавьте описание"></textarea>
                            </li>
                            <button type="submit" class="add-event-button">Сохранить</button>
                        </ul>
                    </form>
                    <button class="button-cancel">Отменить</button>
                </div>
            </div>
        </main>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="../../source/js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/fullcalendar/packages/core/main.js"></script>
    <script src="../../source/fullcalendar/packages/interaction/main.js"></script>
    <script src="../../source/fullcalendar/packages/daygrid/main.js"></script>
    <script src="../../source/fullcalendar/packages/timegrid/main.js"></script>
    <script src="../../source/fullcalendar/packages/list/main.js"></script>
    <script src="../../source/js/timetable.js"></script>
    <script src="../../source/js/popupEdit.js"></script>
    <script src="../../source/js/select.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/imagesUpload.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
    <script src="../../source/js/buttonClose.js"></script>
    <script src="../../source/js/projectRequests.js"></script>
    <script src="../../source/js/popupInvite.js"></script>
    <script src="../../source/jquery-fileinput/jquery.fileinput.js"></script>
</body>

</html>