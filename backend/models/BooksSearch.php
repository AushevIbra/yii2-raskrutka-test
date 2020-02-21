<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Books;

/**
 * BooksSearch represents the model behind the search form of `common\models\db\Books`.
 */
class BooksSearch extends Books
{
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['id', 'author_id', 'rating'], 'integer'],
			[['title', 'publication_date'], 'safe'],
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
	 * {@inheritdoc}
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = Books::find();

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id'               => $this->id,
			'author_id'        => $this->author_id,
			'publication_date' => $this->publication_date,
			'rating'           => $this->rating,
		]);

		$query->andFilterWhere(['like', 'title', $this->title]);

		$query->orderBy([Books::ATTR_RATING => SORT_ASC]);

		return $dataProvider;
	}
}
