    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../source/css/style.css">
    <title>Document</title>
</head>
<body>
<form action="../engine/registration.php" method="post">
    <div class="page-auth">
        <div class="logo mb-3">    
            <img class="logo__img" src="../../source/img/logo.svg" alt="logo">
        </div>
        <form class="auth-form mb-4">
            <input class="auth-form__input mb-4" type="" name="full_name" placeholder="Имя и фамилия" required>
            <input class="auth-form__input mb-4" type="" name="age" placeholder="Возраст" required>
            <input class="auth-form__input mb-4" type="" name="place_of_birth" placeholder="Место рождения" required>
            <textarea class="auth-form__textarea mb-2" type="" name="about_me" placeholder="О себе" required></textarea>
            <input class="auth-form__input mb-4" type="" name="profession" placeholder="Профессия" required>
            <input class="auth-form__input mb-4" type="email" name="email" placeholder="Email" required>
            <input class="auth-form__input mb-4" type="password" name="password" placeholder="Пароль" required>
            <button class="button button_login  mb-3" type="submit"> Зарегистрироваться</button>
            <p class="auth-form__consent">Нажимая на кнопку, Вы принимаете <a href="consent.php">Согласие</a> на обработку персональных данных.</p>
        </form>
    </div>
</form>
</body>