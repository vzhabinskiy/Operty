<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/50l5mcejw0ywz7dlzx8r8he10d2qzk27r3x7gveqd9cqhsm5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="editor-header">
        <div class="editor-header__home">
            <a href="project-card.php" class="editor-header__home__icon">
                <!-- <div class="editor-header__home__icon">
                    <img src="../../source/img/home2.svg" class="editor-header__home__icon__img">
                </div> -->
            </a>
            <a href="project-card.php"><p class="editor-header__home__text">Во все тяжкие | 1 сезон</p></a>
        </div>
        <div class="editor-header__icons">
            <div class="editor-header__icons__list">
                <a href="#" class="editor-popper-button_people">
                </a>
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
    <div class="flex">
        <div class="sidebar-series"> 
            <h5 class="h5__sidebar-series mb-2">Серии</h5>
            <div class="sidebar-series__list">
                <div class="sidebar-series__item sidebar-series__item-selected mb-1">
                    <p class="sidebar-series__item__number">1.</p>
                    <p class="sidebar-series__item__title">Серия</p>
                </div>
                <div class="sidebar-series__item mb-1">
                    <p class="sidebar-series__item__number">2.</p>
                    <p class="sidebar-series__item__title">Серия</p>
                </div>
                <div class="sidebar-series__item mb-1">
                    <p class="sidebar-series__item__number">3.</p>
                    <p class="sidebar-series__item__title">Серия</p>
                </div>
            </div>
        </div>
    
    <?php
    if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    }
    ?>
    <main class="main-content">
    <div class="editor-area mb-10">
          <form id="add-script" method="POST" enctype="multipart/form-data">
          <div class="editor-area__list mb-3">
                <div class="editor-area__item mb-2">
                    <div class="editor-area__title">Номер серии</div>
                    <input class="editor-area__input editor-area__list__number" id="number" name="number">
                </div>
                <div class="editor-area__item mb-2">
                    <div class="editor-area__title">Название серии</div>
                    <input class="editor-area__input editor-area__list__title" id="title" name="title">
                </div> 
          </div>
            <textarea class="" id="text" name="text" placeholder="Напишите что-нибудь">
               
            </textarea>
            <button type="submit" class="button-editor"  id="RegEvent" name="RegEvent" value="RegEvent">Сохранить</button>
          </form>
    </div>
    </main>
    </div>

    <!-- <div class="editor__bottom">
        <a href="">
            <div class="editor__bottom__icon">
                <img src="../../source/img/screen_play.svg" class="editor__bottom__icon__img">
            </div>
        </a>
        <p class="editor-bottom__text">0:24 | 1:03</p>
    </div> -->

    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="../../source/js/editor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- <script src="../../source/js/popper.js"></script> -->
    <script src="../../source/js/night-mode.js"></script>
    <script src="../../source/js/popup-menu-editor.js"></script>
    <script src="../../source/js/toggle.js"></script>
</body>
</html>