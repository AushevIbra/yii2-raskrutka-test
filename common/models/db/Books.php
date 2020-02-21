<?php
declare(strict_types=1);

namespace common\models\db;

use common\validators\DateValidator;
use Yii;
use yii\db\ActiveQuery;
use yii\validators\ExistValidator;
use yii\validators\RequiredValidator;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string|null $publication_date
 * @property int|null $rating
 *
 * @property Authors $author
 */
class Books extends \yii\db\ActiveRecord
{

	const ATTR_ID               = 'id';
	const ATTR_AUTHOR_ID        = 'author_id';
	const ATTR_TITLE            = 'title';
	const ATTR_PUBLICATION_DATE = 'publication_date';
	const ATTR_RATING           = 'rating';

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'books';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[[static::ATTR_AUTHOR_ID, static::ATTR_TITLE], RequiredValidator::class],
			[[static::ATTR_AUTHOR_ID, static::ATTR_RATING], 'integer'],
			[static::ATTR_PUBLICATION_DATE,
			 DateValidator::class,
			 DateValidator::ATTR_FORMAT => 'php:Y-m-d'],
			[[static::ATTR_AUTHOR_ID],
			 ExistValidator::class,
			 'skipOnError'     => true,
			 'targetClass'     => Authors::class,
			 'targetAttribute' => [static::ATTR_AUTHOR_ID => Authors::ATTR_ID]],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			static::ATTR_ID               => 'ID',
			static::ATTR_AUTHOR_ID        => 'Author ID',
			static::ATTR_PUBLICATION_DATE => 'Publication Date',
			static::ATTR_RATING           => 'Rating',
		];
	}

	/**
	 * Gets query for [[Author]].
	 *
	 * @return \yii\db\ActiveQuery|\common\models\db\queries\AuthorsQuery
	 */
	public function getAuthor(): ActiveQuery
	{
		return $this->hasOne(Authors::class, [Authors::ATTR_ID => static::ATTR_AUTHOR_ID]);
	}

	/**
	 * {@inheritdoc}
	 * @return \common\models\db\queries\BooksQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new \common\models\db\queries\BooksQuery(get_called_class());
	}
}
