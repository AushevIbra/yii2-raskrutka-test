<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form \backend\models\forms\AuthorForm */

$this->title                   = 'Create Authors';
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-create">

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
