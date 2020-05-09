
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
</head>
<body>
    <header class=" header mb-10 header_without-logo">
        <form class="search">  
            <input class="search__input" type="text" placeholder="Поиск">
            <button class="search__btn" type="submit">
                <img src="../../source/img/search_icon.svg" alt="Иконка поиска">
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
                <img class="button__icon" src="../../source/img/menu_plus.svg">
                <p class="button__text">Пригласить</p>
            </button>
            <div class="header__notices">
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
    </header>

    <div class="flex">
        <aside class="sidebar  sidebar_flex-basis">
            <a class="sidebar__with-logo" href="/"> 
                <img src="../../source/img/menu_logo.svg" alt="Логотип Operty">
            </a>
            <div class="sidebar__top-list mb-4">
                <ul>
                    <li class="mb-3">
                        <!-- <img class="sidebar_green-mark" src="img/green.svg"> -->
                        <img class="sidebar_list-img" src="../../source/img/house-icon_grey.svg">
                        <a class="sidebar_list-text" href="">Главная</a>
                    </li>
                    <li class="mb-3">
                        <img class="sidebar_list-img" src="../../source/img/archive.svg">
                        <a class="sidebar_list-text" href="">Архив</a>
                    </li>
                </ul>
            </div>
            <div class="sidebar__middle-list">
                <h4 class="h4 mb-3 h4_uppercase">Управление</h4>
                <ul>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Расписание</a>
                    </li>
                    <li class="mb-2">
                        <a class="sidebar_list-text" href="">Участники</a>
                    </li>
                    <li class="selected_item mb-2">
                        <a class="sidebar_current-list__item" href="">Статистика</a>
                    </li>
                 </ul>
            </div>
            <div class="sidebar__bottom-list">
                <ul>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="../../source/img/import.svg">
                        <a class="sidebar_list-text" href="">Импорт</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="../../source/img/basket.svg">
                        <a class="sidebar_list-text" href="">Корзина</a>
                    </li>
                    <li class="mb-2">
                        <img class="sidebar_list-img" src="../../source/img/settings.svg">
                        <a class="sidebar_list-text" href="">Настройки</a>
                    </li>
                </ul>
            </div>
        </aside> 
        <canvas id="myChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <script src="../../source/js/charts.js"></script>
</body>
