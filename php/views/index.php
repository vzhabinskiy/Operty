<?php
require_once "../engine/Db.php";
$db = new Db(); 
$content = $db->selectProjects();
?>
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
                <a href="" class="icon red-round">
                    <img class="menu__notice-icon" src="../../source/img/notice_icon.svg" alt="Иконка уведомлений">
                </a>
            </div>
            <div id="profile_wrapper">
                <a id="button" aria-describedby="tooltip" href="#" class="profile">
                    <img src="../../source/img/producer.jpg" alt="Аватар">
                </a>
                <div id="tooltip" role="tooltip">
                    <ul>
                        <li class="tooltip__item"><a href="personal-card.php">Личный кабинет</a></li>
                        <li class="tooltip__item"><a href="">Выйти</a></li>
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
                <img class="button__icon" src="../../source/img/menu_plus.svg">
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

    <div class="flex center">
        <main class="main-content">
            <div class="page-header mb-5">
                <h1 class="h1 h1_all-projects">Все проекты</h1>
                <div>
                <select class="select-projects" style="width: 126px">
                    <option>Сериалы</option>
                    <option>Фильмы</option>
                </select>
                </div>
            </div>
            <div class="row">
                <a class="create-new row-4 create-new_project mb-3" href="#pop-up__create-new_project">
                    <figure class="create-new__img">
                        <img src="../../source/img/big_plus.svg">             
                    </figure>
                    <p class="create-new__text">Создать проект</p>
                </a>
                <div id="pop-up__create-new_project" class="mfp-hide white-popup-block create-new__pop-up">
                   Новый проект епт 
                </div>
                <?php
                foreach ($content as $key => $value) {
                    echo '
                 <a href="project-card.php" class="card row-4 card_project mb-3">
                    <button class="card__menu"><img src="../../source/img/project_item_menu.svg"></button>
                    <figure class="card__img">
                        <img src="'.$content[$key]["img"].'.jpg" alt="Breaking Bad">             
                    </figure>
                    <h3 class="card__title mb-2">'.$content[$key]["name"].'</h3>
                    <span class="card__subtitle">'.$content[$key]["type_of_project"].'</span>
                </a>
                ';
                }
                ?>
            </div>
        </main>
    </div>    
    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="../../source/js/script.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/popper.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/create-new.js"></script>
</body>
