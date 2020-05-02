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
            <a href="project-card.php">
                <div class="editor-header__home__icon">
                    <img src="../../source/img/home2.svg" class="editor-header__home__icon__img">
                </div>
            </a>
            <a href="project-card.php"><p class="editor-header__home__text">Во все тяжкие | 1 сезон</p></a>
        </div>
        <div class="editor-header__icons">
            <div class="editor-header__icons__list">
                <a href="">
                    <div class="editor-header__icons__item">
                        <img src="../../source/img/people.svg" class="editor-header__icons__img">
                    </div>
                </a>
                <a href="">
                    <div class="editor-header__icons__item">
                        <img src="../../source/img/dots.svg" class="editor-header__icons__img">
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?php
    if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    }
    ?>
    <div class="editor-area">
          <form id="add-script" method="POST" enctype="multipart/form-data">
          <div class="editor-area__list mb-3">
                <input class="editor-area__list__number mb-2" id="number" name="number" placeholder="Номер серии">
                <input class="editor-area__list__title" id="title" name="title" placeholder="Название серии">
          </div>
            <textarea id="text" name="text" placeholder="Напишите что-нибудь">
                
            </textarea>
            <button type="submit"  id="RegEvent" name="RegEvent" value="RegEvent">Сохранить</button>
          </form>
    </div>

    <div class="editor__bottom">
        <a href="">
            <div class="editor__bottom__icon">
                <img src="../../source/img/screen_play.svg" class="editor__bottom__icon__img">
            </div>
        </a>
        <p class="editor-bottom__text">0:24 | 1:03</p>
    </div>

    <div class="help">
        <img class="help__icon" src="../../source/img/question.svg">
    </div>

    <script src="../../source/js/jquery-3.1.1.min.js"></script>
    <script src="../../source/js/editor.js"></script>
</body>
</html>