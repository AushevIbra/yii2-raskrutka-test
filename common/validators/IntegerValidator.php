<?php

declare(strict_types=1);

namespace common\validators;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class IntegerValidator extends NumberValidator {
	/** @inheritdoc */
	public $integerOnly = true;
}
