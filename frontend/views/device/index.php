<?php

use app\models\Store;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Устройства';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить устройство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serial_number',
            [
                'attribute' => 'store_name',
                //'label' => 'Scale',
                'value' => function($model) {
                    return empty($model->store_name) ? null : $model->store_name;
                },
                'filter' => ArrayHelper::map(Store::find()->asArray()->all(), 'name', 'name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions' => [
                    'options' => ['prompt' => ''],
                    'pluginOptions' => ['allowClear' => true],
                    'theme' => 'bootstrap',
                ],
            ],
            'create_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
