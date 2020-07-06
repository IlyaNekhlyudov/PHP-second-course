<?php /** @var \app\models\Product $model */?>
<center>
    <img src="/img/<?=$model->image?>" alt="<?=$model->name?>" style='width: 400px;'>
    <h2><?=$model->name?></h2>
    <p><?=$model->description?></p>
</center>
<div style='margin-left: 40px;'>
    <p>Количество просмотров товара - <?=$model->popularity?>.</p>
</div>