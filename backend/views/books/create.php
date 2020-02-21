<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form \backend\models\forms\BookForm */

$this->title                   = 'Create Books';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php $htmlForm = ActiveForm::begin(); ?>

	<?= $this->render('_form', [
		'htmlForm' => $htmlForm,
		'form'     => $form
	]) ?>

    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>
