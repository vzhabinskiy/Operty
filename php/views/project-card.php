<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Project Card</title>
</head>
<body>
    <header class="header mb-10">
        <a href="index.php"> 
            <img src="../../source/img/menu_logo.svg" alt="Логотип Operty">
        </a>
        <form class="search">  
            <input class="search__input" type="text" placeholder="Поиск">
            <button class="search__btn" type="submit">
                <img src="../../source/img/search_icon.svg" alt="Иконка поиска">
            </button>
        </form>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="index.php" class="menu__link">Проекты</a>
                </li>
                <li class="menu__item">
                    <a href="search-executors.php" class="menu__link">Найти исполнителей</a>
                </li>
            </ul>
        </nav>
        <div class="header__toolbar">
            <button class="button button_border button_icon">
                <img class="button__icon" src="../../source/img/menu_plus.svg">
                <p class="button__text">Пригласить</p>
            </button>
            <div class="header__notices">
                <a href="#" class="icon red-round">
                    <img class="menu__notice-icon" src="../../source/img/notice_icon.svg" alt="Иконка уведомлений">
                </a>
            </div>
            <div id="profile_wrapper">
                <a id="button" aria-describedby="tooltip" href="#" class="profile">
                    <img src="../../source/img/producer.jpg" alt="Аватар">
                </a>
                <div id="tooltip" role="tooltip">
                    <ul>
                        <li class="tooltip__item"><a href="">Личный кабинет</a></li>
                        <li class="tooltip__item"><a href="">Выйти</a></li>
                    </ul>
                    <div id="arrow" data-popper-arrow></div>
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
        <form class="search mb-5">  
            <input class="search__input" type="text" placeholder="Поиск">
            <button class="search__btn" type="submit">
                <img src="../../source/img/search_icon.svg" alt="Иконка поиска">
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
                    <img class="menu__message-icon" src="../../source/img/message_icon.svg" alt="Иконка сообщений">
                </a>
                <a href="#" class="icon red-round">
                    <img class="menu__notice-icon" src="../../source/img/notice_icon.svg" alt="Иконка уведомлений">
                </a>
            </div>
            <a href="#" class="profile">
                <img src="../../source/img/producer.jpg" alt="Аватар">
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
                    <li class="selected_item mb-3">
                        <!-- <img class="sidebar_green-mark" src="img/green.svg"> -->
                        <img class="sidebar_list-img" src="../../source/img/home.svg">
                        <a class="sidebar_current-list__item" href="project-card.php">Сценарии</a>
                    </li>
                    <li class="mb-3 sidebar__top-list__item">
                        <img class="sidebar_list-img" src="../../source/img/timetable.svg">
                        <a class="sidebar_list-text" href="timetable.php">Расписание</a>
                    </li>
                    <li class="mb-3 sidebar__top-list__item">
                        <img class="sidebar_list-img" src="../../source/img/participants_icon.svg">
                        <a class="sidebar_list-text" href="participants.php">Участники</a>
                    </li>
                    <li class="mb-3 sidebar__top-list__item">
                        <img class="sidebar_list-img" src="../../source/img/statistics_icon.svg">
                        <a class="sidebar_list-text" href="">Статистика</a>
                    </li>
                </ul>
            </div>
            <!-- <div class="sidebar__middle-list">
                <h4 class="h4 mb-3 h4_uppercase">Управление</h4>
                <ul>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Расписание</a>
                    </li>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="participants.html">Участники</a>
                    </li>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Статистика</a>
                    </li>
                </ul>
            </div> -->
            <div class="sidebar__bottom-list">
                <ul>
                    <li class="mb-2">
                        <img class="sidebar_list-img bottom_img" src="../../source/img/import.svg">
                        <a class="sidebar_list-text bottom_text" href="">Экспорт</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img bottom_img" src="../../source/img/basket.svg">
                        <a class="sidebar_list-text bottom_text" href="">Корзина</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img bottom_img" src="../../source/img/settings.svg">
                        <a class="sidebar_list-text bottom_text" href="">Настройки</a>
                    </li>
                </ul>
            </div>
        </aside>  
        <main class="main-content">
            <div class="page-header mb-5">
                    <div class="mb-2_adapt">
                        <a href="index.php" class="page-header__folder-icon">
                            <img src="../../source/img/back.svg">
                            <img src="../../source/img/folder.svg">
                        </a>
                        <h1 class="h1 h1_left">Во все тяжкие</h1>
                    </div>
                    <div class="toggle">
                        <a class="page-header__link toggle_icon toggle_icon_active" href="">
                            <svg class="page-header__img" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <rect x="11" y="11" width="7" height="7"></rect>
                                <rect x="21" y="11" width="7" height="7"></rect>
                                <rect x="11" y="21" width="7" height="7"></rect>
                                <rect x="21" y="21" width="7" height="7"></rect>
                            </svg>
                        </a>
                        <a class="page-header__link toggle_icon" href="">
                            <svg class="page-header__img" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <rect x="10" y="11" width="20" height="3" fill="#EFF3F5"></rect>
                                <rect x="10" y="18" width="20" height="3" fill="#EFF3F5"></rect>
                                <rect x="10" y="25" width="20" height="3" fill="#EFF3F5"></rect>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <a class="create-new create-new_script mb-3">
                    <figure class="create-new__img">
                        <img src="../../source/img/big_plus.svg">             
                    </figure>
                    <p class="create-new__text">Создать сценарий</p>
                    </a>
                    <a href="editor.php" class="card row-5 card_script mb-3">
                        <div class="card_script-top_part">
                        <figure class="card_script__img mb-3">
                            <img src="../../source/img/script1.svg" alt="script">             
                        </figure>
                        </div>
                        <div class="card_script-bottom_part">
                            <p class="card_script__text">Во все тяжкие <span>сезон 1</span></p>
                            <button class="card_script__menu"><img src="../../source/img/project_item_menu.svg"></button>
                        </div>
                    </a>
                    <a href="editor.php" class="card row-5 card_script mb-3">
                        <div class="card_script-top_part">
                        <figure class="card_script__img mb-3">
                            <img src="../../source/img/script2.svg" alt="script">             
                        </figure>
                        </div>
                        <div class="card_script-bottom_part">
                            <p class="card_script__text">Во все тяжкие <span>сезон 2</span></p>
                            <button class="card_script__menu"><img src="../../source/img/project_item_menu.svg"></button>
                        </div>
                    </a>
                    <a href="editor.php" class="card row-5 card_script mb-3">
                        <div class="card_script-top_part">
                        <figure class="card_script__img mb-3">
                            <img src="../../source/img/script3.svg" alt="script">             
                        </figure>
                        </div>
                        <div class="card_script-bottom_part">
                            <p class="card_script__text">Во все тяжкие <span>сезон 3</span></p>
                            <button class="card_script__menu"><img src="../../source/img/project_item_menu.svg"></button>
                        </div>
                    </a>
                    <a href="editor.php" class="card row-5 card_script mb-3">
                        <div class="card_script-top_part">
                        <figure class="card_script__img mb-3">
                            <img src="../../source/img/script4.svg" alt="script">             
                        </figure>
                        </div>
                        <div class="card_script-bottom_part">
                            <p class="card_script__text">Во все тяжкие <span>сезон 4</span></p>
                            <button class="card_script__menu"><img src="../../source/img/project_item_menu.svg"></button>
                        </div>
                    </a>
                    <a href="editor.php" class="card row-5 card_script mb-3">
                        <div class="card_script-top_part">
                        <figure class="card_script__img mb-3">
                            <img src="../../source/img/script5.svg" alt="script">             
                        </figure>
                        </div>
                        <div class="card_script-bottom_part">
                            <p class="card_script__text">Во все тяжкие <span>сезон 5</span></p>
                            <button class="card_script__menu"><img src="../../source/img/project_item_menu.svg"></button>
                        </div>
                    </a>
            </div>
        </main>
    </div>    
    

    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/popper.js"></script>
    <script src="../../source/js/menu.js"></script>
</body>
</html>