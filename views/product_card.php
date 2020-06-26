<?php /** @var \app\models\Product $model */?>
<?php if ($user['admin'] > 0) : ?>
    <a href='/admin' style='color: red;'>Админка</a> <br><br>
<?php endif; ?>
<a href='/cart'>Корзина</a>
<center>
    <img src="/img/<?=$model->image?>" alt="<?=$model->name?>" style='width: 400px;'>
    <h2><?=$model->name?></h2>
    <p><?=$model->description?></p>
</center>
<div style='margin-left: 40px;'>
    <p>Количество просмотров товара - <?=$model->popularity?>.</p>
</div>