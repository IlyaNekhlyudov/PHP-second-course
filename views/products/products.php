<link rel="stylesheet" href="/css/products.css">
<h2>Интернет-магазин</h2>
<div style='display: flex;'>
    <?php foreach ($products as $product): ?>
        <div style = 'margin-left: 20px;'>
                <a href="/products/card?id=<?=$product['id']?>">
                    <img width="200" src="/img/small/<?=$product['image']?>" alt="">
                    <p><?=$product['name']?></p>
                </a>
                <form action='/cart/add'>
                    <button formmethod="POST" name="id" value="<?=$product['id']?>" type="submit">Добавить в корзину</button>
                </form>
        </div>
    <?php endforeach;?>
</div>