<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
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
           <div class="profile-editor">
               <div class="profile-editor__row mb-2">
                   <div class="profile-editor__label">Имя</div>
                   <div class="profile-editor__value profile-editor__value_name">
                       <input type="text" value="Армен">
                   </div>
               </div>
               <div class="profile-editor__row mb-2">
                   <div class="profile-editor__label">Возраст</div>
                   <div class="profile-editor__value profile-editor__value_age">
                       <input type="text" value="Иван">
                   </div>
               </div>
               <div class="profile-editor__row mb-2">
                   <div class="profile-editor__label">Место рождения</div>
                   <div class="profile-editor__value profile-editor__value_birth">
                       <input type="text" value="Иван">
                   </div>
               </div>
               <div class="profile-editor__row mb-2">
                   <div class="profile-editor__label">Профессия</div>
                   <div class="profile-editor__value profile-editor__value_profession">
                       <input type="text" value="Иван">
                   </div>
               </div>
               <div class="profile-editor__row mb-2">
                   <div class="profile-editor__label">О себе</div>
                   <div class="">
                       <input class="profile-editor__value_info" type="text" value="Иван">
                   </div>
               </div>
           </div>
        </main>
    </div>
    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div>
    
</body>
</html>