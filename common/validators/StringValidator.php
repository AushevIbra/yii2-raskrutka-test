<?php

declare(strict_types=1);

namespace common\validators;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class StringValidator extends \yii\validators\StringValidator {
	const ATTR_MIN    = 'min';
	const ATTR_MAX    = 'max';
	const ATTR_LENGTH = 'length';
}
