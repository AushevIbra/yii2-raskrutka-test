<?php

declare(strict_types=1);

namespace common\validators;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class NumberValidator extends \yii\validators\NumberValidator {
	const ATTR_MIN            = 'min';
	const ATTR_MAX            = 'max';
	const ATTR_NUMBER_PATTERN = 'numberPattern';
}
