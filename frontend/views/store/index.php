<?php

use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Склады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'value'=> function($data)
                {
                    return  Html::button($data->name,['class' => 'btn-link',
                        'onclick' => 'showMdl("'.Url::to(['store/modal']).'", "'.$data->name.'")']
                    );
                },
                'format' => 'raw'
            ],
            'create_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <?php
        Modal::begin([
            'header'=>'<h5>Список устройств на складе <b style="color:maroon;" id="modal-title"></b></h5>',
            'headerOptions' => [
                'style' => 'background-color: beige;'
            ],
            'options' => [

            ],
            'id'=>'modal',
            'size' => '',
            //'clientOptions' => ['backdrop' => false]
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
</div>
