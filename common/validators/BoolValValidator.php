<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritDoc}
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class BoolValValidator extends FilterValidator {
	/**
	 * {@inheritDoc}
	 *
	 * @author Залатов Александр <zalatov.ao@gmail.com>
	 */
	public function __construct($config = []) {
		$this->filter      = 'boolval';
		$this->skipOnEmpty = true;

		parent::__construct($config);
	}

	/**
	 * {@inheritDoc}
	 *
	 * @author Залатов Александр <zalatov.ao@gmail.com>
	 */
	public function validateAttribute($model, $attribute) {
		if ('true' === $model->$attribute) {
			$model->$attribute = true;
		}
		elseif ('false' === $model->$attribute) {
			$model->$attribute = false;
		}
		else {
			parent::validateAttribute($model, $attribute);
		}
	}
}
