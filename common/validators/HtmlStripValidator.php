<?php

declare(strict_types=1);

namespace common\validators;

use yii\helpers\HtmlPurifier;
use yii\validators\FilterValidator;

/**
 * @inheritdoc
 *
 * @author Залатов Александр <zalatov.ao@gmail.com>
 */
class HtmlStripValidator extends FilterValidator {
	/** @inheritdoc */
	public $filter = [self::class, 'purify'];

	/**
	 * Очистка значения от HTML.
	 *
	 * @param mixed $value Значение для очистки
	 *
	 * @return string|null
	 *
	 * @author Залатов Александр <zalatov.ao@gmail.com>
	 */
	static function purify($value): ?string {
		if (null === $value) {
			return '';
		}

		$value = html_entity_decode($value);
		$purify = HtmlPurifier::process($value, [
			'HTML.Allowed' => '',
		]);

		return html_entity_decode($purify);
	}
}
