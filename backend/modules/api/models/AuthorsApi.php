<?php


namespace app\modules\api\models;


use common\models\db\Authors;

class AuthorsApi extends Authors
{
	/**
	 * {@inheritDoc}
	 *
	 * @author Aushev Ibra <aushevibra@yandex.ru>
	 */
	public function fields()
	{
		return array_merge(parent::fields(), [
			'count' => function () {
				return $this->getBooks()->count();
			}
		]);
	}
}