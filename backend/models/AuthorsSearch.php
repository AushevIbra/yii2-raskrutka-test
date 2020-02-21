<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\db\Authors;

/**
 * AuthorsSearch represents the model behind the search form of `common\models\db\Authors`.
 */
class AuthorsSearch extends Authors
{
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['id', 'rating'], 'integer'],
			[['name', 'birthday'], 'safe'],
		];
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
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function formName()
	{
		return '';
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
		$query = Authors::find();

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
			'id'       => $this->id,
			'birthday' => $this->birthday,
			'rating'   => $this->rating,
		]);


		$query->andFilterWhere(['like', 'name', $this->name]);

		$query->orderBy([Authors::ATTR_RATING => SORT_DESC]);

		return $dataProvider;
	}
}
