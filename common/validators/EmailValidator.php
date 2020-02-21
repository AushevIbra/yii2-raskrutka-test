<?php

declare(strict_types=1);

namespace common\validators;

use yii\validators\EmailValidator as EmailValidatorParent;

/**
 * {@inheritdoc}
 *
 * @author  Sergey Sadovin <sadovin.serj@gmail.com>
 */
class EmailValidator extends EmailValidatorParent {
	/**
	 * {@inheritdoc}
	 *
	 * @author Sergey Sadovin <sadovin.serj@gmail.com>
	 */
	public function init() {
		$this->pattern     = $this->replacePattern($this->pattern);
		$this->fullPattern = $this->replacePattern($this->fullPattern);

		parent::init();
	}

	/**
	 * Переопределим паттерн для проверки кириллического email
	 *
	 * @param string $pattern
	 *
	 * @return string
	 *
	 * @author Sergey Sadovin <sadovin.serj@gmail.com>
	 */
	private function replacePattern(string $pattern): string {
		$pattern = str_replace("a-zA-Z0-9", "a-zA-Z0-9а-яА-ЯёЁ", $pattern);

		return $pattern . 'u'; // Unicode
	}
}
