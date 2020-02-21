<?php

declare(strict_types=1);

namespace common\validators;

use Yii;
use yii\base\ErrorException;
use yii\base\InvalidConfigException;
use yii\helpers\BaseFileHelper;
use yii\validators\Validator;

/**
 * Валидатор SVG файла по пути к файлу с указание абсолютного пути
 * Проверяет: существует ли файл и mime-тип image/svg
 *
 * @author Nikita Bolshebratskii <nik.kg@ya.ru>
 */
class ExistSvgValidator extends Validator {
	/**
	 * @var string Абсолютный путь до необходимой папки
	 *
	 * Пример абсолютного пути: Yii::getAlias('@frontend/web')
	 */
	public $absolutePath;
	const ATTR_ABSOLUTE_PATH = 'absolutePath';

	/**
	 * {@inheritdoc}
	 *
	 * @author Nikita Bolshebratskii <nik.kg@ya.ru>
	 */
	public function validateAttribute($model, $attribute) {
		$value = $model->$attribute;

		if (null === $this->absolutePath) {
			throw new InvalidConfigException(Yii::t('common', 'Вы должны указать абсолютный путь в параметре "absolutePath"'));
		}

		if (false === file_exists($this->absolutePath . $value)) {
			$this->addError($model, $attribute, Yii::t('common', 'Указан не правильный путь'));
		}

		try {
			if ('image/svg' !== BaseFileHelper::getMimeType($this->absolutePath . $value)) {
				$this->addError($model, $attribute, Yii::t('common', 'Указанный файл не является mime-типом image/svg'));
			}
		}
		catch (ErrorException $e) {
			$this->addError($model, $attribute, Yii::t('common', 'Указан не правильный путь'));
		}
	}
}