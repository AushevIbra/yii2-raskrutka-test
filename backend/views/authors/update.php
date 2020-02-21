<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Authors */
/* @var $form \backend\models\forms\AuthorForm */

$this->title                   = 'Update Authors: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php $htmlForm = ActiveForm::begin(); ?>

	<?= $this->render('_form', [
		'form'     => $form,
		'htmlForm' => $htmlForm
	]) ?>

    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
	<?php ActiveForm::end(); ?>
</div>
