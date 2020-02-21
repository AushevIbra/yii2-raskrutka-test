<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form \backend\models\forms\BookForm */
/* @var $htmlForm yii\widgets\ActiveForm */
?>

<div class="books-form">


	<?= $htmlForm->field($form, $form::ATTR_AUTHOR_ID)->dropDownList($form->getAuthors()) ?>

	<?= $htmlForm->field($form, $form::ATTR_TITLE)->textInput(['maxlength' => true]) ?>

	<?= $htmlForm->field($form, $form::ATTR_PUBLICATION_DATE)->textInput(['type' => 'date']) ?>

	<?= $htmlForm->field($form, $form::ATTR_RATING)->textInput() ?>


</div>
