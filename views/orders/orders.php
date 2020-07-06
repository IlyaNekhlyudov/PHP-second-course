<h3>Список заказов</h3>

<table cellpadding='15px' border='1px'>
    <tr>
        <td>Дата</td>
        <td>Статус</td>
        <td>Заказ</td>
        <td>Адрес</td>
    </tr>

    <? foreach ($orders as $order): ?>
        <tr>
            <td><?=$order['date']?></td>
            <td><?=$order['status']?></td>
            <td>
                <? foreach (unserialize($order['products']) as $product): ?>
                    <?=$product['productName']?> (<?=$product['quantity']?> шт.) - <?=$product['productPrice']?> руб. за шт.<br> 
                <? endforeach; ?>
            </td>
            <td><?=$order['address']?></td>
    <? endforeach; ?>

</table>