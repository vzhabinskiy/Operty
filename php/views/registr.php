<?php 
require_once "../engine/Db.php";
$db = new Db(); 
$content = $db->selectProfession();
if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    }
?>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
</head>
<body>
<form action="../engine/registration.php" method="post">
    <div class="page-registr">
        <div class="logo mb-3">    
            <img class="logo__img" src="../../source/img/logo.svg" alt="logo">
        </div>
        <form class="auth-form mb-4">
            <input class="auth-form__input mb-4" type="" name="full_name" placeholder="Имя и фамилия" required>
            <input class="auth-form__input mb-4" type="" name="age" placeholder="Возраст" required>
            <div class="auth-form__gender mb-4">
                <p class="auth-form__head">Выберите пол:</p>
                <div class="auth-form__gender__switch">
                    <input class="radio" id="radio-1" type="radio" value ="1" name="id_gender" checked />
                    <label for="radio-1"></label>
                    <input class="radio" id="radio-2" type="radio" value ="2" name="id_gender" />
                    <label for="radio-2"></label>
                </div>
            </div>
            <div class="auth-form__profession mb-4">
               <p class="auth-form__head__profession">Выберите профессию:</p>
               <select class="select-responsible-add" style="width: 160px; height:40px" id="responsible" name="id_profession">
               <?php
               foreach ($content as $key => $value) {
                    echo '
                    <option value="'.$value["id"].'">'.$value["type"].'</option> ';
               }
                 ?>
                </select> 
            </div>
            <input class="auth-form__input mb-4" type="" name="place_of_birth" placeholder="Место рождения" required>
            <textarea class="auth-form__textarea mb-2" type="" name="about_me" placeholder="О себе" required></textarea>
            <!-- <input class="auth-form__input mb-4" type="" name="profession" placeholder="Профессия" required> -->
            <input class="auth-form__input mb-4" type="email" name="email" placeholder="Email" required>
            <input class="auth-form__input mb-4" type="password" name="password" placeholder="Пароль" required>
            <button class="button button_login  mb-3" type="submit"> Зарегистрироваться</button>
            <p class="auth-form__consent">Нажимая на кнопку, Вы принимаете <a href="consent.php">Согласие</a> на обработку персональных данных.</p>
        </form>
    </div>
</form>
<script src="../../source/js/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript" src="../../source/js/select.js"></script>
<script src="../../source/js/jquery-3.1.1.min.js"></script>
<script src="../../source/js/closeEvent.js"></script>
</body>