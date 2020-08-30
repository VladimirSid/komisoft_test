<?php

use app\models\Store;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_name')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Store::find()->asArray()->all(), 'name', 'name'),
        'value' => $model->store_name,
        'theme' => 'bootstrap',
        'options' => ['placeholder' => 'Выберите склад ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>



    <?//= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
