<?php

declare(strict_types=1);

namespace common\validators;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class CompareValidator extends \yii\validators\CompareValidator {
	const ATTR_COMPARE_ATTRIBUTE = 'compareAttribute';
	const ATTR_COMPARE_VALUE     = 'compareValue';
}
