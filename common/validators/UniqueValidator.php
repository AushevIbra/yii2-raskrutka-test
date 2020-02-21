<?php

declare(strict_types=1);

namespace common\validators;

/**
 * {@inheritdoc}
 *
 * @author Lev Stepanets <lev.stepanets@gmail.com>
 */
class UniqueValidator extends \yii\validators\UniqueValidator {
	const ATTR_TARGET_CLASS     = 'targetClass';
	const ATTR_TARGET_ATTRIBUTE = 'targetAttribute';
	const ATTR_FILTER           = 'filter';
	const ATTR_MESSAGE          = 'message';
	const ATTR_COMBO_NOT_UNIQUE = 'comboNotUnique';
}