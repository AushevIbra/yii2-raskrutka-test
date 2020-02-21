<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\FilterValidator;

/**
 * {@inheritdoc}
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class TrimValidator extends FilterValidator {
    public $filter      = 'trim';
    public $skipOnEmpty = true;
}
