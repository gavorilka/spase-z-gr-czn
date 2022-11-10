<?php
    session_start();

    // var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>
    <body>
    <?php
        if(empty($_POST['user']) || empty($_POST['password'] || $_POST['user'] != "redactor" || $_POST['password'] != '123456')) {
            echo "Не верные имя пользователя или пароль";
        } else {
            $_SESSION["admin"] = true;
        }
        if(isset($_SESSION["admin"]) && $_SESSION["admin"]) header('Location: admin_panel.php');
    ?>
    <form class="decor"  method="POST">
        <div class="form-left-decoration"></div>
        <div class="form-right-decoration"></div>
        <div class="circle"></div>
        <div class="form-inner">
            <h3>Вход администратора</h3>
            <input type="text" name="user" placeholder="Пользователь">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" value="Войти">
        </div>
    </form>
    </body>
</html>