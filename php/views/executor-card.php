<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Executor card</title>
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
        <main class="main-content main-content_min">
            <div class="page-header mb-5">
                <div class="page-header__left">
                    <a href="search-executors.php" class="page-header__left-icon">
                        <img src="../../source/img/back2.svg">
                    </a>
                    <h1 class="h1 h1_left h1_executor-card">Аарон Пол</h1>
                    <span class="page-header__info">Актер, продюсер</span>
                </div>
                <div class="page-header__right">
                    <p class="page-header__rating mb-1">Рейтинг</p>
                    <span class="page-header__number">9.1</span>
                </div>
            </div>
            <div class="executor">
                <div class="executor-avatar">
                    <figure class="executor-avatar__main mb-4">
                        <img  src="../../source/img/aaron_card.jpg" alt="">
                    </figure>
                    <button class="button button_executor mb-4">Написать сообщение</button>
                    <div class="executor-avatar__photo">
                        <h6 class="h6 mb-2">Фотографии</h6>
                        <figure class="executor-avatar__photos">
                            <img  src="../../source/img/aaron_1.jpg" alt="">
                        </figure>
                        <figure class="executor-avatar__photos">
                            <img  src="../../source/img/aaron_2.jpg" alt="">
                        </figure>
                    </div>
                </div>
                <div class="executor-intro">
                    <div class="executor-intro__top mb-10">
                        <div class="executor-intro__data-list mb-3">
                            <p class="executor-intro__data-item mb-1">Возраст</p>
                            <p class="executor-intro__data-item executor-intro__data-item-value">39 лет</p>
                        </div>
                        <div class="executor-intro__info-list">
                            <p class="executor-intro__info-item mb-1">Место рождения</p>
                            <p class="executor-intro__info-item executor-intro__info-item-value">Эммет, Айдахо, США</p>
                        </div>
                    </div>
                    <div class="executor-intro__about mb-10">
                        <h6 class="h6 mb-2">О себе</h6>
                        <p class="executor-intro__description">Родился 27 августа 1979 года в штате Айдахо. Отец был проповедником христиан-баптистов и Аарон с детства выступал в пьесах на разнообразных церковных праздниках.
                           Малыша все любили, ведь он был самым младшим в семье (у Аарона четверо старших братьев и сестер). Учился будущий актер в средней школе города Бойсе и в восьмом классе решил, 
                           что станет актером. Он вступил в кружок драмы и не пропускал ни одной школьной постановки. Помимо учебы и увлечением театра Аарон успел поработать на местном радио.
                        </p>
                    </div>
                    <div class="executor-intro_portfolio">
                        <h6 class="h6 mb-2">Портфолио</h6>
                        <figure class="executor-intro_portfolio-img">
                            <img  src="../../source/img/portfolio.jpg" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div> 

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="../../source/js/menu.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.3.3/dist/umd/popper.min.js"></script>
    <script src="../../source/js/popper.js"></script>
</body>
</html>