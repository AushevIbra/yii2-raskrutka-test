<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\db\Authors */
/* @var $form \backend\models\forms\AuthorForm */
?>

<div class="authors-form">


	<?= $htmlForm->field($form, $form::ATTR_NAME)->textInput(['maxlength' => true]) ?>

	<?= $htmlForm->field($form, $form::ATTR_BIRTHDAY)->textInput(['type' => 'date']) ?>

	<?= $htmlForm->field($form, $form::ATTR_RATING)->textInput() ?>


</div>
