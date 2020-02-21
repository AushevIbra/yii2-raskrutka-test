<?php

namespace common\models\db;

use common\validators\DateValidator;
use common\validators\IntegerValidator;
use Yii;
use yii\validators\RequiredValidator;
use yii\validators\StringValidator;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 * @property string|null $birthday
 * @property int|null $rating
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{

	const ATTR_ID       = 'id';
	const ATTR_NAME     = 'name';
	const ATTR_BIRTHDAY = 'birthday';
	const ATTR_RATING   = 'rating';

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'authors';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[[static::ATTR_NAME], RequiredValidator::class],
			[[static::ATTR_BIRTHDAY], DateValidator::class, DateValidator::ATTR_FORMAT => 'php:Y-m-d'],
			[[static::ATTR_RATING], IntegerValidator::class],
			[[static::ATTR_NAME], StringValidator::class, 'max' => 255],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			static::ATTR_ID       => 'ID',
			static::ATTR_NAME     => 'Name',
			static::ATTR_BIRTHDAY => 'Birthday',
			static::ATTR_RATING   => 'Rating',
		];
	}

	/**
	 * Gets query for [[Books]].
	 *
	 * @return \yii\db\ActiveQuery|\common\models\db\queries\BooksQuery
	 */
	public function getBooks()
	{
		return $this->hasMany(Books::class, ['author_id' => static::ATTR_ID]);
	}

	/**
	 * {@inheritdoc}
	 * @return \common\models\db\queries\AuthorsQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \common\models\db\queries\AuthorsQuery(get_called_class());
	}
}
