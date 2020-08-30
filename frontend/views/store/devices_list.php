<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="">
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'serial_number',
                'value'=> function($data)
                {
                    return  Html::a($data->serial_number,
                        [Url::toRoute(['device/index','DeviceSearch[serial_number]' => $data->serial_number])],
                        ['onclick' => 'redirectDevice(this, event);']
                    );
                },
                'format' => 'raw'
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
