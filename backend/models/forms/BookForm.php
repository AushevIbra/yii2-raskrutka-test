<?php

declare(strict_types=1);

namespace backend\models\forms;


use common\models\db\Authors;
use common\models\db\Books;
use common\validators\DateValidator;
use common\validators\IntegerValidator;
use common\validators\StringValidator;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\validators\RequiredValidator;
use zalatov\yii2\extend\exceptions\ValidationException;

/**
 * Class BookForm
 *
 * @author Aushev Ibra <aushevibra@yandex.ru>
 */
class BookForm extends Model
{
	/**
	 * @var string
	 */
	public $title;
	const ATTR_TITLE = 'title';

	/**
	 * @var int
	 */
	public $author_id;
	const ATTR_AUTHOR_ID = 'author_id';

	/**
	 * @var string
	 */
	public $publication_date;
	const ATTR_PUBLICATION_DATE = 'publication_date';

	/**
	 * @var int
	 */
	public $rating;
	const ATTR_RATING = 'rating';
	/**
	 * @var Books
	 */
	private $model;

	/**
	 * BookForm constructor.
	 * @param Books $model
	 * @param array $config
	 */
	public function __construct(Books $model, $config = [])
	{
		parent::__construct($config);
		$this->model = $model;

		if (false === $model->isNewRecord) {
			$this->rating           = $model->rating;
			$this->title            = $model->title;
			$this->author_id        = $model->author_id;
			$this->publication_date = $model->publication_date;
		}

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
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function rules()
	{
		return [
			[static::ATTR_RATING, IntegerValidator::class],
			[static::ATTR_RATING, RequiredValidator::class],
			[static::ATTR_AUTHOR_ID, IntegerValidator::class],
			[static::ATTR_AUTHOR_ID, RequiredValidator::class],

			[static::ATTR_TITLE, RequiredValidator::class],
			[static::ATTR_TITLE, StringValidator::class],

			[static::ATTR_PUBLICATION_DATE, RequiredValidator::class],
			[static::ATTR_PUBLICATION_DATE, DateValidator::class, DateValidator::ATTR_FORMAT => 'php:Y-m-d']
		];
	}

	public function attributeLabels()
	{
		return $this->model->attributeLabels();
	}


	/**
	 * @return array
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function getAuthors()
	{
		return ArrayHelper::map(Authors::find()->asArray()->all(), 'id', 'name');
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

		$this->model->title            = $this->title;
		$this->model->rating           = $this->rating;
		$this->model->author_id        = $this->author_id;
		$this->model->publication_date = $this->publication_date;

		if (false === $this->model->save()) {
			throw new ValidationException($this->model);
		}

		return true;
	}
}