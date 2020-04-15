<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/list/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Timetable</title>
</head>
<body>
    <header class=" header mb-10">
        <a href="/"> 
            <img src="img/menu_logo.svg" alt="Логотип Operty">
        </a>
        <form class="search">  
            <input class="search__input" type="text" placeholder="Поиск">
            <button class="search__btn" type="submit">
                <img src="img/search_icon.svg" alt="Иконка поиска">
            </button>
        </form>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="#" class="menu__link">Проекты</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Найти исполнителей</a>
                </li>
            </ul>
        </nav>
        <div class="header__toolbar">
            <button class="button button_border button_icon">
                <img class="button__icon" src="img/menu_plus.svg">
                <p class="button__text">Пригласить</p>
            </button>
            <div class="header__notices">
                <a href="#" class="icon">
                    <img class="menu__message-icon" src="img/message_icon.svg" alt="Иконка сообщений">
                </a>
                <a href="#" class="icon red-round">
                    <img class="menu__notice-icon" src="img/notice_icon.svg" alt="Иконка уведомлений">
                </a>
            </div>
            <a href="#" class="profile">
                <img src="img/producer.jpg" alt="Аватар">
            </a>
        </div>
    </header>

    <div class="mobile-menu_container mb-5">
        <a href="/" class="mobile-menu_logo"> 
            <img src="img/menu_logo.svg" alt="Логотип Operty">
        </a>
        <div class="mobile-menu">
            <span class="menu-burger"></span>
        </div>
    </div>

    <div class="menu_mob">
        <form class="search mb-5">  
            <input class="search__input" type="text" placeholder="Поиск">
            <button class="search__btn" type="submit">
                <img src="img/search_icon.svg" alt="Иконка поиска">
            </button>
        </form>
        <nav class="menu mb-5">
            <ul class="menu__list">
                <li class="menu__item mb-5">
                    <a href="#" class="menu__link">Проекты</a>
                </li>
                <li class="menu__item">
                    <a href="#" class="menu__link">Найти исполнителей</a>
                </li>
            </ul>
        </nav>
        <div class="header__toolbar">
            <button class="button button_border button_icon mb-5">
                <img class="button__icon" src="img/menu_plus.svg">
                <p class="button__text">Пригласить</p>
            </button>
            <div class="header__notices mb-2">
                <a href="#" class="icon">
                    <img class="menu__message-icon" src="img/message_icon.svg" alt="Иконка сообщений">
                </a>
                <a href="#" class="icon red-round">
                    <img class="menu__notice-icon" src="img/notice_icon.svg" alt="Иконка уведомлений">
                </a>
            </div>
            <a href="#" class="profile">
                <img src="img/producer.jpg" alt="Аватар">
            </a>
        </div>
    </div>

    <div class="flex">
        <aside class="sidebar sidebar_flex-basis">
            <!-- <a class="sidebar__with-logo" href="/"> 
                <img src="img/menu_logo.svg" alt="Логотип Operty">
            </a> -->
            <div class="sidebar__top-list mb-4">
                <ul>
                    <li class="mb-3">
                        <!-- <img class="sidebar_green-mark" src="img/green.svg"> -->
                        <img class="sidebar_list-img" src="img/house-icon_grey.svg">
                        <a class="sidebar_list-text" href="project-card.html">Главная</a>
                    </li>
                    <li class="mb-3">
                        <img class="sidebar_list-img" src="img/archive.svg">
                        <a class="sidebar_list-text" href="">Архив</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__middle-list">
                <h4 class="h4 mb-3 h4_uppercase">Управление</h4>
                <ul>
                    <li class="selected_item mb-2">
                        <a class="sidebar_current-list__item" href="">Расписание</a>
                    </li>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Участники</a>
                    </li>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Статистика</a>
                    </li>
                 </ul>
            </div>
            <div class="sidebar__bottom-list">
                <ul>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="img/import.svg">
                        <a class="sidebar_list-text" href="">Импорт</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="img/basket.svg">
                        <a class="sidebar_list-text" href="">Корзина</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="img/settings.svg">
                        <a class="sidebar_list-text" href="">Настройки</a>
                    </li>
                </ul>
            </div>
        </aside>
        <main class="main-content">
            <div class="page-header mb-2">
                <div class="mb-2_adapt">
                    <h1 class="h1">Расписание</h1>
                </div> 
                <?php
                if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                }
                ?>
            </div>
            
            <!-- календарь -->
            <div id="calendar"></div> 
            <!-- поп-ап для создания события -->
            <a class="popup-with-add-form" href="#add-event-form"></a>
            <form id="add-event-form" method="POST" enctype="multipart/form-data"  class="mfp-hide white-popup-block add-event-popup">
                <span id="msg-reg"></span>
                    <ul class="add-event-popup-list">
                        <li class="add-event-popup-item mb-2">
                            <label for="title"></label>
                            <img class="add-event-popup__blue-round-img" src="img/blue-round.svg">
                            <input id="title" maxlength="30" class="add-event-popup-item_input-title" name="title" type="text" placeholder="Название мероприятия">
                        </li>
                        <div class="add-event-popup-line-1 mb-2">
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/responsible-min.svg">
                                <select class="select-responsible-add" style="width: 220px; height:40px" id="responsible" name="responsible">
                                    <option value="">Ответственные</option>
                                    <option value="Продюресы">Продюресы</option>
                                    <option value="Сценаристы">Сценаристы</option>
                                    <option value="Композиторы">Композиторы</option>
                                </select>
                            </li>
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-1__input" id="place" name="place" type="text" placeholder="Место проведения">
                            </li>
                        </div>
                        <div class="add-event-popup-line-2 mb-2">
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-2__input" id="start"  name="start" type="text" placeholder="Начало события">
                            </li>
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-2__input" id="end"  name="end" type="text" placeholder="Конец события">
                            </li>
                        </div>
                        <li class="add-event-popup-item mb-2">
                            <label for="description"></label>
                            <input id="description" class="add-event-popup-item_input-description" name="description" placeholder="Добавьте описание">
                        </li>
                        <button type="submit" class="add-event-button" id="RegEvent" name="RegEvent" value="RegEvent">Сохранить</button>
                    </ul>
            </form>
            <!-- поп-ап с деталями события -->
            <a class="popup-with-details" href="#details"></a>
            <div id="details"  class="mfp-hide white-popup-block details-popup">
                <div class="event-detail">
                    <div class=" mb-2">
                        <h3 class="h3">Детали мероприятия</h3>
                    </div>
                    <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Название</div>
                        <div class="event-detail-item__value" id="title"></div>
                    </div>
                    <!-- <div class="event-detail-item mb-2">
                        <div class="event-detail-item__key">Ответственные</div>
                        <div class="event-detail-item__value" id="responsible"></div>
                    </div> -->
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
                        <div class="event-detail-item__value" id="description"></div>
                    </div>
                    <button class="button-edit mb-2">Редактировать</button>
                    <a href="" id="button-delete" ><button class="button-delete">Удалить</button></a>
                </div>
                <!-- поп-ап для редактирования события -->
                <div class="edit-form">
                <form id="edit-event-form" method="POST" enctype="multipart/form-data"  class="white-popup-block popup mb-2">
                <span id="msg-edit"></span>
                    <input type="hidden" name="id" id="id">
                    <ul class="add-event-popup-list">
                        <li class="add-event-popup-item mb-2">
                            <label for="title"></label>
                            <img class="add-event-popup__blue-round-img-2" src="img/blue-round.svg">
                            <input id="title" maxlength="30" class="add-event-popup-item_input-title" name="title" type="text" placeholder="Название мероприятия">
                        </li>
                        <div class="add-event-popup-line-1 mb-2">
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/responsible-min.svg">
                                <select style="width: 220px; height:40px" id="responsible" name="responsible">
                                    <option value="">Ответственные</option>
                                    <option value="Продюресы">Продюресы</option>
                                    <option value="Сценаристы">Сценаристы</option>
                                    <option value="Композиторы">Композиторы</option>
                                </select>
                            </li>
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-1__input" id="place" name="place" type="text" placeholder="Место проведения">
                            </li>
                        </div>
                        <div class="add-event-popup-line-2 mb-2">
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-2__input" id="start"  name="start" type="text" placeholder="Начало события">
                            </li>
                            <li class="add-event-popup-line-1-item">
                                <img class="" src="img/nav.svg">
                                <input class="add-event-popup-line-2__input" id="end"  name="end" type="text" placeholder="Конец события">
                            </li>
                        </div>
                        <li class="add-event-popup-item mb-2">
                            <label for="description"></label>
                            <input id="description" class="add-event-popup-item_input-description" name="description" placeholder="Добавьте описание">
                        </li>
                        <button type="submit" class="add-event-button" id="RegEvent" name="RegEvent" value="RegEvent">Сохранить</button>
                    </ul>
                </form>
                <button class="button-cancel">Отменить</button>
                </div>        
            </div>
        </main>       
    </div> 

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="fullcalendar/packages/core/main.js"></script>
    <script src="fullcalendar/packages/interaction/main.js"></script>
    <script src="fullcalendar/packages/daygrid/main.js"></script>
    <script src="fullcalendar/packages/timegrid/main.js"></script>
    <script src="fullcalendar/packages/list/main.js"></script>
    <script src="js/timetable.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>