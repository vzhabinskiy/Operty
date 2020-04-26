<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="php/engine/authorization.php" method="post">
    <div class="page-auth">
        <div class="logo mb-10">
            <img class="logo__img" src="img/logo.svg" alt="logo">
        </div>
        <form class="auth-form mb-4">
            <input class="auth-form__input" type="email" name="email" placeholder="Email" required>
            <input class="auth-form__input mb-4" type="password" name="password" placeholder="Пароль" required>
            <button class="button button_login  button_full mb-3" type="submit"> Войти </button>
            <a class="auth-form__link mb-3" href="password-recovery.php">Забыли пароль?</a>
            <a class="auth-form__link mb-3" href="registr.php">Регистрация</a>
        </form>
        <div class="socials">
            <div class="socials_item">
                <img class="socials-item__img" src="img/google.svg" alt="google">
            </div>
            <div class="socials_item">
                <img class="socials-item__img" src="img/facebook.svg" alt="facebook">   
            </div>
        </div>
    </div>
</form>

