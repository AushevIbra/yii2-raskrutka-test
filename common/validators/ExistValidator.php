<?php

declare(strict_types=1);

namespace common\validators;

/**
 * {@inheritdoc}
 *
 * @author Lev Stepanets <lev.stepanets@gmail.com>
 */
class ExistValidator extends \yii\validators\ExistValidator {
	const ATTR_TARGET_CLASS              = 'targetClass';
	const ATTR_TARGET_ATTRIBUTE          = 'targetAttribute';
	const ATTR_TARGET_RELATION           = 'targetRelation';
	const ATTR_FILTER                    = 'filter';
	const ATTR_ALLOW_ARRAY               = 'allowArray';
	const ATTR_TARGET_ATTRIBUTE_JUNCTION = 'targetAttributeJunction';
	const ATTR_FORCE_MASTER_DB           = 'forceMasterDb';
}