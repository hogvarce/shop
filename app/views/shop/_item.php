<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::a(Html::img($item->thumb(120), ['alt' => $item->title]), ['shop/view', 'slug' => $item->slug]) ?>
    </div>
    <div class="col-md-10">
        <p><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
         <p>
            <span class="text-muted">Марка:</span> <?= $item->data->brand ?>
         <br/>
            <span class="text-muted">Объем:</span> <?= $item->data->upakovka ?>
         <br/>
            <?php if(!empty($item->data->color) ) : ?>
                <span class="text-muted">Цвета:</span> <?= implode(', ', $item->data->color) ?>
            <?php endif; ?>
            <br/>
            <?php if(!empty($item->data->features) ) : ?>
                <span class="text-muted">Дополнительно:</span> <?= implode(', ', $item->data->features) ?>
            <?php endif; ?>
        </p>
        <h3>
            <?php if($item->discount) : ?>
                <del class="small"><?= $item->oldPrice ?></del>
            <?php endif; ?>
            <?= $item->price ?>&#8381;
        </h3>
        <hr>
    </div>
</div>
<br>
