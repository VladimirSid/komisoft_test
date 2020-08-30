<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use kartik\icons\FontAwesomeAsset;
FontAwesomeAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Store */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
