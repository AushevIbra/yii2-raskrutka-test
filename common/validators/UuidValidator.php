<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\RegularExpressionValidator;

class UuidValidator extends RegularExpressionValidator {
	/** @{inheritdoc} */
	public $pattern = '/^[0-9A-F]{8}-[0-9A-F]{4}-[01345][0-9A-F]{3}-[0-9A-F]{4}-[0-9A-F]{12}$/i';
}