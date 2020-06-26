<h3>Привет, <?=$user->name?>!</h3>

<p>Ссылки для быстрого перехода:</p>
<ul>
    <li><a href='/'>Каталог товаров</a></li>
    <?php if($user->admin > 0): ?>
        <li><a href='/?c=admin'>Админка</a></li>
    <?php endif; ?>
    <li><a href='/?c=user&a=exit'>Выход</a></li>
</ul>