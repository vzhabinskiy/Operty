<?php
require_once "../engine/Db.php";
$db = new Db();
$projectId = $_GET['id_project'];
$scriptId = $_GET['id_script'];
$seriesId = $_GET['id_series'];
$project = $db->selectProject($projectId);
$content = $db->selectScript($projectId, $scriptId);
$series = $db->selectSeries($scriptId);
$oneSeries = $db->selectOneSeries($projectId, $scriptId, $seriesId);
$_SESSION['id_project'] = $_GET['id_project'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://cdn.tiny.cloud/1/50l5mcejw0ywz7dlzx8r8he10d2qzk27r3x7gveqd9cqhsm5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="editor-header">
        <div class="editor-header__home">
            <a href="project-card.php?id_project=<?= $project[0]["id"] ?>" class="editor-header__home__icon"></a>
            <a href="project-card.php?id_project=<?= $project[0]["id"] ?>">
                <p class="editor-header__home__text"><?= $project[0]["name"] ?> | <?= $content[0]["title"] ?></p>
            </a>
        </div>
        <div class="editor-header__icons">
            <div class="editor-header__icons__list">
                <a href="#" class="editor-popper-button_dots">
                </a>
                <div class="editor-popper editor-popper-js">
                    <div class="editor-popper__night-mode">
                        <p class="editor-popper__night-mode__text">Ночной режим</p>
                        <div class="toggle-night"></div>
                    </div>
                    <div id="editor-popup-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu_container mb-5">
        <div class="editor-header__home-mob">
            <a href="project-card.php?id_project=<?= $project[0]["id"] ?>" class="editor-header__home__icon"></a>
            <a class="editor-header__home_link" href="project-card.php?id_project=<?= $project[0]["id"] ?>">
                <p class="editor-header__home__text"><?= $project[0]["name"] ?> | <?= $content[0]["title"] ?></p>
            </a>
        </div>
        <div class="mobile-menu">
            <span class="menu-burger"></span>
        </div>
    </div>

    <div class="menu_mob">
        <div class="menu_mob__wrapper">
            <div class="menu_mob__bottom">
                <h5 class="h5__sidebar-series mb-2">Серии</h5>
                <?php foreach ($series as $key => $value) : ?>
                    <a href="series.php?id_project=<?= $project[0]["id"] ?>&id_script=<?= $value["script_id"] ?>&id_series=<?= $value["id"] ?>" class="sidebar-series__item mb-3">
                        <p class="sidebar-series__item__number"><?= $value["number"] ?>.</p>
                        <p class="sidebar-series__item__title"><?= $value["title"] ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php if ($project[0]['author'] == true) : ?>
            <div class="menu_mob__middle">
                <ul class="menu_mob__middle__list">
                    <li class="menu_mob__middle__item ">
                        <a class="menu_mob__middle__new-series" href="editor.php?id_project=<?= $content[0]["id"] ?>&id_script=<?= $content[0]["script_id"] ?>">Новая серия</a>
                        <img src="../../source/img/plus_mob.svg" class="menu_mob__bottom__icon" alt="">
                    </li>
                    <li class="menu_mob__middle__item ">
                        <a class="menu_mob__middle__edit" id="edit-script-popup-mob" href="#pop-up__edit_script-mob">Редактировать</a>
                        <img src="../../source/img/edit.svg" class="menu_mob__bottom__icon" alt="">
                    </li>
                    <div id="pop-up__edit_script-mob" class="mfp-hide white-popup-block add-script-popup">
                        <form id="update-script-mob" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <img class="add-script-popup__blue-round-img" src="../../source/img/blue-round.svg">
                                <input value="<?= $content[0]["title"] ?>" id="title" maxlength="30" class="add-script-popup__item__input-title" name="title" type="text" placeholder="Название сценария">
                            </div>
                            <input type="hidden" name="id" id="id" value="<?= $content[0]["script_id"] ?>">
                            <button class="button__add-script" type="submit">Сохранить</button>
                        </form>
                    </div>
                    <li class="menu_mob__middle__item ">
                        <a class="menu_mob__middle__delete" id="delete-script-popup-mob" href="#pop-up__delete_script-mob">Удалить</a>
                        <img src="../../source/img/delete.svg" class="menu_mob__bottom__icon" alt="">
                    </li>
                    <div id="pop-up__delete_script-mob" class="mfp-hide white-popup-block delete-project-popup">
                        <div class="delete-project-popup__list">
                            <div class="delete-project-popup__item mb-3">
                                <p class="delete-project-popup__text">Удалить сценарий "<?= $content[0]["title"] ?>"?</p>
                            </div>
                            <div class="delete-project-popup__item">
                                <a href="../engine/delete_script.php?id=<?= $content[0]["script_id"] ?>" id="delete-project"><button class="delete-project-popup__button">Удалить сценарий</button></a>
                            </div>
                        </div>
                    </div>
                </ul>
            <?php endif; ?>
            </div>
            <div class="toggle-night__mob">
                <p class="toggle-night__head mb-1">Ночной режим</p>
                <div class="toggle-night"></div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="sidebar-series">
            <h5 class="h5__sidebar-series mb-2">Серии</h5>
            <div class="sidebar-series__list mb-2">
                <?php foreach ($series as $key => $value) : ?>
                    <a href="series.php?id_project=<?= $project[0]["id"] ?>&id_script=<?= $value["script_id"] ?>&id_series=<?= $value["id"] ?>" class="sidebar-series__item mb-3">
                        <p class="sidebar-series__item__number"><?= $value["number"] ?>.</p>
                        <p class="sidebar-series__item__title"><?= $value["title"] ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php if ($project[0]['author'] == true) : ?>
            <div class="sidebar-series__bottom-line mb-2"></div>
            <div class="sidebar-series__edit">
                <div class="sidebar-series__item mb-3">
                    <img src="../../source/img/plus_mob.svg" class="sidebar_list-img" alt="">
                    <a class="sidebar_list-text" href="editor.php?id_project=<?= $content[0]["id"] ?>&id_script=<?= $content[0]["script_id"] ?>">Новая серия</a>
                </div>
                <div class="sidebar-series__item mb-3">
                    <img src="../../source/img/edit.svg" class="sidebar_list-img" alt="">
                    <a class="sidebar_list-text" id="edit-script-popup" href="#pop-up__edit_script">Редактировать</a>
                </div>
                <div id="pop-up__edit_script" class="mfp-hide white-popup-block add-script-popup">
                    <form id="update-script" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <img class="add-script-popup__blue-round-img" src="../../source/img/blue-round.svg">
                            <input value="<?= $content[0]["title"] ?>" id="title" maxlength="30" class="add-script-popup__item__input-title" name="title" type="text" placeholder="Название сценария">
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $content[0]["script_id"] ?>">
                        <button class="button__add-script" type="submit">Сохранить</button>
                    </form>
                </div>
                <div class="sidebar-series__item">
                    <img src="../../source/img/delete.svg" class="sidebar_list-img" alt="">
                    <a class="sidebar_list-text" id="delete-script-popup" href="#pop-up__delete_script">Удалить</a>
                </div>
                <div id="pop-up__delete_script" class="mfp-hide white-popup-block delete-project-popup">
                    <div class="delete-project-popup__list">
                        <div class="delete-project-popup__item mb-3">
                            <p class="delete-project-popup__text">Удалить сценарий "<?= $content[0]["title"] ?>"?</p>
                        </div>
                        <div class="delete-project-popup__item">
                            <a href="../engine/delete_script.php?id=<?= $content[0]["script_id"] ?>" id="delete-project"><button class="delete-project-popup__button">Удалить сценарий</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </div>
        <main class="main-content">
            <div class="series__area">
                <div class="series__area__head">
                    <h3 class="series__title mb-3"><?= $oneSeries[0]["title"] ?></h3>
                <?php if ($project[0]['author'] == true) : ?>
                    <div class="series__edit mb-3">
                        <div class="series__edit__item">
                            <img src="../../source/img/edit.svg" class="sidebar_list-img" alt="">
                            <a class="series__link" href="edit-series.php?id_project=<?= $project[0]["id"] ?>&id_script=<?= $oneSeries[0]["script_id"] ?>&id_series=<?= $oneSeries[0]["series_id"] ?>">Редактировать</a>
                        </div>
                        <div class="series__edit__slash">
                            |
                        </div>
                        <div class="series__edit__item">
                            <img src="../../source/img/delete.svg" class="sidebar_list-img" alt="">
                            <a class="series__link" id="delete-series-popup" href="#pop-up__delete_series">Удалить</a>
                        </div>
                        <div id="pop-up__delete_series" class="mfp-hide white-popup-block delete-project-popup">
                            <div class="delete-project-popup__list">
                                <div class="delete-project-popup__item mb-3">
                                    <p class="delete-project-popup__text">Удалить серию "<?= $oneSeries[0]["title"] ?>"?</p>
                                </div>
                                <div class="delete-project-popup__item">
                                    <a href="../engine/delete_editor_series.php?id=<?= $oneSeries[0]["series_id"] ?>" id="delete-project"><button class="delete-project-popup__button">Удалить cерию</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <p class="series__text"><?= $oneSeries[0]["text"] ?></p>
            </div>
        </main>
    </div>
    <div class="help">
        <a href="manual.php"><img class="help__icon" src="../../source/img/question.svg"></a>
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="../../source/js/editor.js"></script>
    <script src="../../source/js/nightMode.js"></script>
    <script src="../../source/js/dropMenu.js"></script>
    <script src="../../source/js/buttonClose.js"></script>
    <script src="../../source/js/popupEdit.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/scriptRequests.js"></script>
    <script src="../../source/js/imagesUpload.js"></script>
    <script src="../../source/js/pagination.js"></script>
    <script src="../../source/jquery-fileinput/jquery.fileinput.js"></script>
</body>

</html>