<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/layouts.css">
    <title>Интернет-магазин</title>
</head>
<body>
<header>
    <ul class='menu'>
        <? if($params['user']): ?>
            <li><a href='/' class='menu-link'>Продукты</a></li>
            <li><a href='/user' class='menu-link'>Аккаунт</a></li>
            <li><a href='/cart' class='menu-link'>Корзина</a></li>
            <? if($params['user']->admin > 0): ?>
                <li><a href='/admin' class='menu-link'>Админка</a></li>
            <? endif; ?>
            <li><a href='/user/exit' class='menu-link'>Выход</a></li>
        <? else: ?>
            <li><a href='/user/auth' class='menu-link'>Авторизоваться</a></li>
            <li><a href='/user/register' class='menu-link'>Зарегистрироваться</a></li>
        <? endif; ?>
    </ul>
    <? if($params['message']): ?>
        <p class='message'><?=$params['message']?></p>
    <? endif; ?>
</header>

<?=$content?>
</body>
</html>
