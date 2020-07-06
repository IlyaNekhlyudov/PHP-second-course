<h3>Корзина<h3>

<? if ($cart): ?>
    <table cellpadding='15px' border='1px'>
        <tr>
            <td>Изображение</td>
            <td>Название товара</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Действие</td>
        </tr>
        <?php foreach ($cart as $value): ?>            
            <tr>
                <td><img width="100" src="/img/small/<?=$value['productImage']?>" alt=""></td>
                <td><?=$value['productName']?></td>
                <td><?=$value['productPrice']?></td>
                <td><?=$value['quantity']?></td>
                <td>
                    <form action='/cart/remove'>
                        <button formmethod="POST" name="id" value="<?=$value['productID']?>" type="submit">Удалить</button>
                    </form>
                </td>
            <tr>
        <?php endforeach; ?>
    </table>

    <h3>Оформление заказа</h3>
    <form action='/orders/add' method='POST'>
        <p>Номер телефона</p>
        <input name='phone' type='tel' placeholder='Введите ваш телефон' required>
        <p>Адрес</p>
        <input name='address' type='text' placeholder='Введите адрес' required>
        <p>E-mail</p>
        <input name='email' type='email' placeholder='Введите e-mail' required>
        <br>
        <input type='submit' value='Подтвердить заказ'>
    </form>

<? else: ?>
    <p>Товаров нет.</p>
<? endif; ?>