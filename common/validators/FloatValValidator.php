<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritDoc}
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class FloatValValidator extends FilterValidator {
	/**
	 * {@inheritDoc}
	 *
	 * @author Залатов Александр <zalatov.ao@gmail.com>
	 */
	public function __construct($config = []) {
		$this->filter      = 'floatval';
		$this->skipOnEmpty = true;

		parent::__construct($config);
	}
}
