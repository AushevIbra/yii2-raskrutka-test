<?php


namespace app\modules\api\controllers;


use app\modules\api\models\AuthorsApi;
use yii\rest\ActiveController;
use yii\rest\Controller;

class AuthorsController extends ActiveController
{
	public $modelClass = AuthorsApi::class;
}