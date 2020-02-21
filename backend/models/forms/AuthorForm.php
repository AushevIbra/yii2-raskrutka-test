<?php


namespace backend\models\forms;


use common\models\db\Authors;
use yii\base\Model;
use yii\validators\RequiredValidator;
use zalatov\yii2\extend\exceptions\ValidationException;

class AuthorForm extends Model
{
	/**
	 * @var string
	 */
	public $name;
	const ATTR_NAME = 'name';

	/**
	 * @var string
	 */
	public $birthday;
	const ATTR_BIRTHDAY = 'birthday';

	/**
	 * @var string
	 */
	public $rating;
	const ATTR_RATING = 'rating';
	/**
	 * @var Authors
	 */
	private $model;

	public function __construct(Authors $model, $config = [])
	{
		parent::__construct($config);
		$this->model = $model;

		if (false === $model->isNewRecord) {
			$this->name     = $model->name;
			$this->rating   = $model->rating;
			$this->birthday = $model->birthday;
		}
	}

	/**
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function attributeLabels()
	{
		return $this->model->attributeLabels();
	}

	/**
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function rules()
	{
		return [
			[static::ATTR_NAME, RequiredValidator::class],
			[static::ATTR_RATING, RequiredValidator::class],
			[static::ATTR_BIRTHDAY, RequiredValidator::class],
		];
	}

	/**
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function formName()
	{
		return '';
	}

	/**
	 * @return bool
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function save()
	{
		if (false === $this->validate()) {
			return false;
		}
		$this->model->name     = $this->name;
		$this->model->birthday = $this->birthday;
		$this->model->rating   = $this->rating;

		if (false === $this->model->save()) {
			throw new ValidationException($this->model);
		}

		return true;
	}
}