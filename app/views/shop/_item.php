<?php use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-2">
        <?= Html::a(Html::img($item->thumb(120), ['alt' => $item->title]), ['shop/view', 'slug' => $item->slug]) ?>
    </div>
    <div class="col-md-10" itemscope itemtype="http://schema.org/Product">
        <p itemprop="name"><?= Html::a($item->title, ['shop/view', 'slug' => $item->slug]) ?></p>
         <p>
            <span class="text-muted">Марка:</span><span itemprop="brand"> <?= ($item->data->brand) ? $item->data->brand : ''?></span>
         <br/>
            <span class="text-muted" >Объем:</span><span itemprop="description "> <?= ($item->data->obiem) ? $item->data->obiem : ''?></span>
         <br/>
            <?php if(!empty($item->data->color) ) : ?>
                <span class="text-muted">Цвета:</span><span itemprop="color"> <?= implode(', ', $item->data->color) ?></span>
            <?php endif; ?>
            <br/>
            <?php if( isset($item->data->features) && !empty($item->data->features) ) : ?>
                <span class="text-muted">Дополнительно:</span> <?= implode(', ', $item->data->features) ?>
            <?php endif; ?>
        </p>
         <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <h3>
                <?php if($item->discount) : ?>
                    <del class="small"><?= $item->oldPrice ?></del>
                <?php endif; ?>
                <span itemprop="price"><?= $item->price ?></span><span itemprop="priceCurrency" content="RUB">&#8381;</span>
            </h3>
        </div>
        <hr>
    </div>
</div>
<br>
