<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritDoc}
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class IntValValidator extends FilterValidator {
	/**
	 * {@inheritDoc}
	 *
	 * @author Залатов Александр <zalatov.ao@gmail.com>
	 */
	public function __construct($config = []) {
		$this->filter      = 'intval';
		$this->skipOnEmpty = true;

		parent::__construct($config);
	}
}
