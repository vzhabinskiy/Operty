<?php
require_once "../engine/Db.php";
$db = new Db(); 
$content = $db->selectUsers();
$avatar = $db->selectAvatars();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.css" rel="stylesheet">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Search executors</title>
</head>
<body>
    <header class="header mb-5">
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
            <?php
                foreach ($avatar as $key => $value) {
                    echo '
                <a id="button" aria-describedby="tooltip" href="#" class="profile"> 
                <img src="'.$value["avatar"].'.jpg" alt="Аватар">
            </a>
        ' ; 
            }
                ?>
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
            <?php
                foreach ($avatar as $key => $value) {
                    echo '
            <a href="#" class="profile">
                <img src="'.$value["img"].'.jpg" alt="Аватар">
            </a>
        ' ; 
            }
            ?>
        </div>
    </div>

    <div class="flex">
        <aside class="filters filters_flex-basis">
            <div class="mb-4">
                <h5 class="h5 mb-2">Роли</h5>
                <select class="select-roles" style="width: 174px">
                    <option>Актеры</option>
                    <option>Актрисы</option>
                </select>
            </div>
            <div class="mb-4">
                <h5 class="h5 mb-2">Возраст</h5>
                <div class="filters-range" id="range-slider"></div>
                <div class="filters-range__counter">
                    <span class="filters-range__counter-start" id="start"></span>
                    <span class="filters-range__counter-end" id="end"></span>
                </div>      
            </div> 
            <div class="mb-4">
                <h5 class="h5 mb-2 h5_left" >Пол</h5>
                <!-- <div class="filters-gender">
                    <button class="filters-gender__male filters-gender_selected">Мужской</button>
                    <button class="filters-gender__female">Женский</button>
                </div> -->
                <div>
                    <input class="radio" id="radio-1" type="radio" name="radio" checked />
                    <label for="radio-1"></label>
                    <input class="radio" id="radio-2" type="radio" name="radio" />
                    <label for="radio-2"></label>
                </div>
            </div>
            <div class="mb-4">
                <h5 class="h5 mb-2">Регион</h5>
                <select class="select-region" style="width: 174px">
                    <option>Везде</option>
                    <option>США</option>
                </select>
            </div>
            <div class="filters-check mb-4">
                <!-- <div class="filters-check__item mb-2">
                    <button class="filters-check__btn filters-check_selected"></button>
                    <p class="filters-check__text">Только с фото</p>
                </div>
                <div class="filters-check__item">
                    <button class="filters-check__btn"></button>
                    <p class="filters-check__text">Только с примерами работ</p>
                </div> -->
                <input type="checkbox" id="c1" name="check" />
                <label for="c1" class="mb-2"><span></span>Только с фото</label>
                <input type="checkbox" id="c2" name="check" checked/>
                <label for="c2"><span></span>Только с примерами работ</label>
            </div>
            <button class="button button_filters mb-4">Пригласить</button>
            <a href="#" class="filters-link">Сбросить</a>
        </aside>
        <main class="main-content">
            <div class="page-header mb-5">
                <div>
                    <h1 class="h1 mb-2_adapt">Поиск исполнителей</h1>
                </div>
                <p class="page-header__text mb-2_adapt">Найдено 12 000 исполнителей</p>
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
                <select class="select-executors" style="width: 187px">
                    <option>По рейтингу</option>
                    <option>По алфавиту</option>
                </select>
            </div>
            <div class="row">
            <?php
                foreach ($content as $key => $value) {
                    echo '
                <a href="executor-card.php?id_user='.$value['id'].'" class="card row-2 card_executor mb-3">
                    <div class="card_executor-top mb-3">
                        <figure class="card_executor__img ">
                            <img src="'.$value["avatar"].'.jpg" alt="Брайан Крэнстон">             
                        </figure>
                        <div class="card_executor__intro">
                            <h3 class="card_executor__title mb-1">'.$value["full_name"].'</h3>
                            <span class="card_executor__subtitle">'.$value["type"].'</span>
                        </div>
                    </div>
                    <div class="card_executor-bottom">
                        <div class="card_executor__data-list mb-1">
                            <span class="card_executor__data-item">Возраст</span>
                            <span class="card_executor__data-item card_executor__data-item_value">'.$value["age"].'</span>
                        </div>
                        <div class="card_executor__info-list">
                            <span class="card_executor__info-item">Место рождения</span>
                            <span class="card_executor__info-item card_executor__info-item_value">'.$value["place_of_birth"].'</span>
                        </div>
                    </div> 
                </a> ' ; 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/9.2.0/nouislider.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/select.js"></script>
    <script src="../../source/js/filterRangeSlider.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="../../source/js/popupMenuHeader.js"></script>
</body>