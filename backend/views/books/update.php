<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\db\Books */
/* @var $form \backend\models\forms\BookForm */

$this->title                   = 'Update Books: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="books-update">

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
