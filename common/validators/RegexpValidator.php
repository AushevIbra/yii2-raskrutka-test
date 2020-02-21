<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\RegularExpressionValidator;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class RegexpValidator extends RegularExpressionValidator {
	const ATTR_PATTERN = 'pattern';
}
