<?php

declare(strict_types=1);

namespace common\validators;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class DateValidator extends \yii\validators\DateValidator {
	const ATTR_FORMAT = 'format';
}
